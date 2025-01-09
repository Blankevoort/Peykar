<template>
  <q-card flat bordered>
    <!-- Job`s Tags -->
    <div class="row justify-between" v-if="job.tags">
      <div class="row col-12">
        <div class="col-10" @click="$router.push('/job/' + job.id)">
          <q-badge
            v-for="(tag, index) in job.tags"
            :key="index"
            class="q-my-xs q-mx-xs q-py-sm"
            :color="tag.important ? 'red-2' : 'indigo-1'"
            :text-color="tag.important ? 'negative' : 'primary'"
            :label="tag.label"
          />
        </div>

        <div class="col-2 text-right" v-if="user">
          <q-btn
            v-if="!job.liked"
            @click="like(job.id)"
            flat
            icon="favorite_outline"
          />

          <q-btn
            v-else
            @click="like(job.id)"
            color="red"
            flat
            icon="favorite"
          />
        </div>

        <div class="col-2 text-right" v-else>
          <q-btn
            @click="$router.push('/account')"
            flat
            icon="favorite_outline"
          />
        </div>
      </div>
    </div>

    <q-card-section horizontal @click="$router.push('/job/' + job.id)">
      <q-card-section class="col-xs-5 col-sm-3 flex flex-center">
        <q-img
          class="rounded-borders"
          :src="'http://127.0.0.1:8000/storage/companyImages/' + job.image"
          style="width: 48px; height: 48px"
        />
      </q-card-section>

      <q-card-section>
        <div class="q-mt-sm q-mb-xs">{{ job.title }}</div>

        <div class="text-caption" v-if="job.company">
          {{ job.company }}
        </div>

        <div class="text-caption text-grey row">
          <div>
            {{ job.location }}
          </div>

          <div class="row" v-if="job.rightsMin">
            <span class="q-px-sm">|</span>

            <p class="text-positive" v-if="job.rightsMax">
              {{ job.rightsMin }} - {{ job.rightsMax }}
            </p>
            <p class="text-positive" v-else>{{ job.rightsMin }}+</p>
          </div>
        </div>
      </q-card-section>
    </q-card-section>

    <q-separator inset />

    <q-card-actions class="q-px-sm">
      <q-btn
        class="font-13 text-grey-6"
        flat
        @click="$router.push('/job/' + job.id)"
      >
        {{ timeSincePosted(job.created_at) }}
      </q-btn>

      <q-space />

      <q-btn
        color="positive"
        label="ارسال رزومه"
        @click="sendCV(job.id)"
        v-if="!job.requested"
      />

      <q-btn
        color="green-7"
        label="ارسال شده"
        @click="sendCV(job.id)"
        disable
        v-else
      />
    </q-card-actions>
  </q-card>
</template>

<script>
import dayjs from "dayjs";

export default {
  props: {
    job: {
      type: Object,
      required: true,
    },
    user: {
      type: Object,
      required: false,
    },
    like: {
      type: Function,
      required: true,
    },
    sendCV: {
      type: Function,
      required: true,
    },
  },

  setup() {
    const timeSincePosted = (created_at) => {
      const now = dayjs();
      const posted = dayjs(created_at);

      if (!posted.isValid()) {
        console.error("Invalid Date:", created_at);
        return "تاریخ نامعتبر";
      }

      const diffInDays = now.diff(posted, "day");

      if (diffInDays > 1) {
        return `${diffInDays} روز پیش`;
      } else if (diffInDays === 1) {
        return "دیروز";
      } else {
        return "امروز";
      }
    };

    return {
      timeSincePosted,
    };
  },
};
</script>
