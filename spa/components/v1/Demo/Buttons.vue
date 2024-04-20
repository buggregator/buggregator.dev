<script setup lang="ts">
const buttons = [
  {
    key: "ray",
    title: 'spatie/ray package support',
    description: 'The Ray debug tool supports PHP, Ruby, JavaScript, TypeScript, NodeJS, Go and Bash applications. After installing one of the libraries, you can use the ray function to quickly dump stuff. Any variable(s) that you pass will be sent to the Buggregator.',
    events: [
      {
        group: 'common',
        actions: [
          'Int', 'String', 'Array', 'Bool', 'Object', 'Colors', 'Sizes', 'Labels', 'Caller', 'Trace', 'Counter',
          'CounterWithName', 'Limit', 'ClassName', 'Measure', 'Json', 'Xml', 'Carbon', 'File', 'Table', 'Image',
          'Html', 'Text', 'Hide', 'Notify', 'Phpinfo', 'Exception', 'Markdown',
        ]
      },
      {
        group: 'laravel',
        actions: [
          'ShowQueries', 'CountQueries', 'ManuallyShowedQuery', 'ShowEvents', 'ShowJobs', 'ShowCache',
          'ShowHttpClientRequests', 'HandlingModels', 'Mailable', 'ShowViews', 'Collections', 'StrString',
          'Env',
        ]
      },

      {
        group: 'logs',
        actions: [
          'Debug', 'Info', 'Warning', 'Error', 'Critical', 'Notice', 'Alert', 'Emergency', 'Exception',
        ]
      }
    ],
    docs: 'https://docs.buggregator.dev/config/ray.html',
  },
  {
    key: "profiler",
    title: 'xhprof PHP Profiler',
    description: 'Pinpoint performance bottlenecks in your PHP applications. This lightweight profiler provides essential insights to optimize your code for better efficiency and speed.',
    events: [
      {
        group: 'common',
        actions: [
          'Report',
        ]
      }
    ],
    docs: 'https://docs.buggregator.dev/config/xhprof.html'
  },
  {
    key: "sentry",
    title: 'Sentry Integration.',
    description: 'Use Buggregator as a local alternative to Sentry for catching exceptions.',
    events: [
      {
        group: 'common',
        actions: [
          'Report',
          'Event'
        ]
      }
    ],
    docs: 'https://docs.buggregator.dev/config/sentry.html',
  },
  {
    key: "monolog",
    title: 'monolog/monolog package support',
    description: 'Analyze logs from your PHP application.',
    events: [
      {
        group: 'common',
        actions: [
          'Debug',
          'Info',
          'Warning',
          'Error',
          'Critical',
          'Notice',
          'Alert',
          'Emergency',
          'Exception',
        ]
      }
    ],
    docs: 'https://docs.buggregator.dev/config/monolog.html',
  },
  {
    key: "smtp",
    title: 'SMTP Server',
    description: 'Test email functionalities within your applications without relying on external email servers.',
    events: [
      {
        group: 'common',
        actions: [
          'OrderShipped',
          'WelcomeMail',
        ]
      }
    ],
    docs: 'https://docs.buggregator.dev/config/smtp.html',
  },
  {
    key: "var_dump",
    title: 'symfony/var-dumper server.',
    description: 'The dump() and dd() functions display their output in the same browser window or console terminal as your application, which can sometimes lead to confusion by mixing real and debug outputs. To avoid this, the Buggregator is used to collect all dumped data separately.',
    events: [
      {
        group: 'common',
        actions: [
          'String',
          'Array',
          'Bool',
          'Int',
          'Object',
          'Exception',
        ]
      }
    ],
    docs: 'https://docs.buggregator.dev/config/var-dumper.html',
  },
  {
    key: "inspector",
    title: 'inspector.dev Integration',
    description: 'A handy feature for local development, ensuring swift issue identification and resolution.',
    events: [
      {
        group: 'common',
        actions: [
          'Request',
          'Command',
        ]
      }
    ],
    docs: 'https://docs.buggregator.dev/config/inspector.html',
  },
]

const camelToSnakeCase = (str: string) => str.replace(/[A-Z]/g, letter => `_${letter.toLowerCase()}`).slice(1);

const callAction = (section: string, group: string, action: string) => {
  const app = useNuxtApp();

  let call: string;

  if (group !== 'common') {
    call = `${section}_${group}`;
  } else {
    call = section;
  }

  call += `:${camelToSnakeCase(action)}`;

  app.$api.examples.call(call);
}
</script>

<template>
  <div class="buttons">
    <div class="section" v-for="section in buttons" :id="section.key" :key="section.key">

      <h3 class="title">{{ section.title }}</h3>
      <p v-if="section.description" class="description">{{ section.description }}</p>

      <div class="docs">
        <a href="{{ section.docs }}" target="_blank" class="read-more-link blue small">Docs</a>
      </div>

      <div v-for="event in section.events" :key="`${section.key}-${event.group}`" class="events">
        <h4 v-if="event.group !== 'common'" class="title">{{ event.group }}</h4>
        <div class="events-buttons">
          <button v-for="action in event.actions" @click="callAction(section.key, event.group, action)"
                  type="button"
                  class="button"
          >
            {{ action }}
          </button>
        </div>
      </div>
    </div>
  </div>
</template>

<style scoped lang="scss">
.buttons {
  @apply w-40 md:w-1/3 xl:w-1/4 flex flex-col md:gap-4;

  .section {
    @apply border p-4 md:p-6 lg:p-10 md:rounded-l-xl bg-white hover:shadow-xl transition;

    > .title {
      @apply md:text-xl leading-none font-bold text-blue-800 tracking-tight mb-4;
    }

    > .description {
      @apply hidden md:block text-gray-500 text-sm font-medium mb-6;
    }

    > .docs {
      @apply mb-8 flex gap-4 items-center;
    }

    > .events {
      .title {
        @apply md:text-xl leading-none font-extrabold text-blue-600 tracking-tight mt-6 mb-4;
      }

      > .events-buttons {
        @apply overflow-hidden flex flex-wrap gap-2 md:gap-3 lg:gap-4 text-sm;

        .button {
          @apply border rounded-full text-blue-600 md:py-1 md:px-3 px-2 lg:px-3 border-blue-400 hover:bg-blue-500 hover:text-white transition-all duration-300;
        }
      }
    }
  }
}
</style>