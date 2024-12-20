<template>
  <q-page class="row justify-center">
    <!-- Medium-4k Screen Content -->

    <div
      class="col-md-12 col-lg-8 col-xl-7 row justify-between items-center gt-sm"
    >
      <div
        class="col-md-6 col-lg-6 col-xl-6 text-weight-bold"
        style="font-size: 40px"
      >
        <div class="row" style="width: 350px">
          <span class="text-primary">39,271</span> آگهی شغلی در
          <span class="text-primary">454</span> شهر
        </div>
      </div>

      <div class="col-md-6 col-lg-6 col-xl-6">
        <div class="row justify-center">
          <img
            style="width: 350px; height: 350px"
            src="/assets/IR-Map.svg"
            alt="iranMap"
          />
        </div>
      </div>

      <div class="text-weight-bold q-my-md" style="font-size: 20px">
        دنبال چه شغلی می‌گردید؟
      </div>

      <div class="col-12 row justify-between">
        <div class="col-4 q-gutter-y-sm">
          <div class="text-grey-6 font-12">عنوان شغلی یا شرکت ...</div>

          <q-select
            class="q-px-sm"
            outlined
            v-model="title"
            :options="options"
            use-input
            hide-dropdown-icon
            @filter="filterFn"
            clearable
          >
            <template v-slot:prepend>
              <q-img
                src="https://jobvision.ir/assets/images/search/search-gray.svg"
                style="width: 20px"
              />
            </template>
          </q-select>
        </div>

        <div class="col-3 q-gutter-y-sm">
          <div class="text-grey-6 font-12">گروه شغلی</div>
          <q-select
            class="q-px-sm"
            style="height: 44px !important"
            outlined
            v-model="group"
            :options="options"
            clearable
          >
            <template v-slot:prepend>
              <q-img
                src="https://jobvision.ir/assets/images/search/briefcase-gray.svg"
                style="width: 20px"
              />
            </template>
          </q-select>
        </div>

        <div class="col-3 q-gutter-y-sm">
          <div class="text-grey-6 font-12">شهر</div>
          <q-select
            class="q-px-sm"
            outlined
            v-model="location"
            :options="options"
            use-input
            hide-dropdown-icon
            @filter="filterFn"
            clearable
          >
            <template v-slot:prepend>
              <q-img
                src="https://jobvision.ir/assets/images/jobs/location-selected.svg"
                style="width: 20px"
              />
            </template>
          </q-select>
        </div>

        <div class="col-2 flex items-end">
          <q-btn
            color="primary"
            label="جستجو در مشاغل"
            class="q-px-sm text-bold"
            @click="search"
            style="height: 45px; width: 150px"
          />
        </div>
      </div>

      <div
        class="text-weight-bold col-12"
        style="font-size: 20px; height: 50px; margin-top: 55px"
      >
        تازه‌ترین آگهی‌های شغلی برای شما
      </div>

      <!-- Tabs -->

      <div class="col-12 row">
        <q-tabs
          class="text-bold"
          active-color="primary"
          content-class="text-bold"
          inline-label
          v-model="tab"
        >
          <q-tab class="text-bold" name="suggestions">
            <q-icon class="q-pr-md" size="24px" name="auto_awesome" />
            <span>مشاغل پیشنهادی</span>
          </q-tab>

          <!-- <q-tab content-class="text-bold" name="history">
            <q-icon class="q-pr-md" size="24px" name="history" />
            <span>آخرین جستجوی یوزر</span>
          </q-tab> -->
        </q-tabs>
      </div>

      <q-tab-panels
        class="full-width"
        v-model="tab"
        animated
        swipeable
        vertical
        transition-prev="jump-up"
        transition-next="jump-up"
      >
        <q-tab-panel
          class="row justify-around"
          name="suggestions"
          style="font-size: 16px"
        >
          <div class="col-12 text-grey-6 q-my-md font-14">
            پیشنهاد شده بر اساس رفتار و عملکرد شما
          </div>

          <div
            v-for="(job, index) in jobs"
            :key="'job-' + index + 1"
            class="q-my-md q-px-xs col-md-4 col-lg-4 col-xl-4"
          >
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

              <q-card-section
                horizontal
                @click="$router.push('/job/' + job.id)"
              >
                <q-card-section class="col-xs-5 col-sm-3 flex flex-center">
                  <q-img
                    class="rounded-borders"
                    :src="
                      'http://127.0.0.1:8000/storage/companyImages/' + job.image
                    "
                    style="width: 48px; height: 48px"
                  />
                </q-card-section>

                <q-card-section @click="$router.push('/job/' + job.id)">
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

              <q-card-actions
                class="q-px-sm"
                @click="$router.push('/job/' + job.id)"
              >
                <q-btn class="font-13 text-grey-6" flat>
                  {{ timeSincePosted(job.created_at) }}</q-btn
                >

                <q-space />

                <q-btn color="positive" label="ارسال رزومه" />
              </q-card-actions>
            </q-card>
          </div>
        </q-tab-panel>

        <q-tab-panel name="history"> </q-tab-panel>
      </q-tab-panels>

      <!-- Some Explanations About App -->

      <div class="col-12 q-mt-lg q-mb-sm row justify-center">
        <q-btn
          outline
          color="black"
          icon-right="keyboard_backspace"
          label="مشاهده همه"
          to="/jobs"
        />
      </div>

      <q-card
        flat
        class="global-emplyment q-mt-md col-12 row justify-center content-center items-center q-py-lg q-mb-md"
      >
        <div class="col-10">
          <q-card-section
            class="row justify-between content-center items-center"
            horizontal
          >
            <q-card-section class="col-6">
              <div class="text-bold text-h5 q-pb-md">
                استخدام‌های سراسری و دولتی
              </div>
              <div class="q-py-md text-grey-7">
                در این قسمت، آخرین فرصت‌های استخدام سراسری و دولتی به‌طور مرتب
                به‌روزرسانی و منتشر می‌شوند. به صفحه استخدام‌های سراسری سر بزنید
                و از بررسی روزانه ده‌ها سایت و مرجع خبری دیگر بی‌نیاز شوید.
              </div>

              <q-btn
                class="q-my-md text-bold"
                outline
                color="black"
                label="مشاهده فرصت های شغلی"
                to="jobs"
              />
            </q-card-section>

            <div class="col-4">
              <q-img
                style="width: 80%; height: 80%"
                src="https://jobvision.ir/assets/images/home-page/global-employment.svg"
              />
            </div>
          </q-card-section>
        </div>
      </q-card>
    </div>

    <!-- Extrea Small Screen Content -->

    <div
      class="col-12 q-px-sm row justify-between content-center items-center lt-md"
    >
      <!-- Hero Section - Header -->

      <div class="col-6 text-weight-bold q-my-md" style="font-size: 32px">
        <div class="row" style="width: 350px">
          <span class="text-primary">39,271</span> آگهی شغلی در
          <span class="text-primary">454</span> شهر
        </div>
      </div>

      <!-- Hero Section - Inputs -->

      <div class="text-weight-bold col-12 q-my-md" style="font-size: 20px">
        دنبال چه شغلی می‌گردید؟
      </div>

      <div class="col-12 row justify-between content-center">
        <q-select
          class="col-12 q-py-xs q-px-sm"
          outlined
          v-model="model"
          :options="options"
          label="عنوان شغلی یا شرکت"
        >
          <template v-slot:prepend>
            <q-icon name="search" />
          </template>
        </q-select>

        <q-select
          class="col-12 q-py-xs q-px-sm"
          outlined
          v-model="model"
          :options="options"
          label="گروه شغلی"
        >
          <template v-slot:prepend>
            <q-icon name="work" />
          </template>
        </q-select>

        <q-select
          class="col-12 q-py-xs q-px-sm"
          outlined
          v-model="model"
          :options="options"
          label="شهر"
        >
          <template v-slot:prepend>
            <q-icon name="location_on" />
          </template>
        </q-select>

        <div class="full-width q-my-sm q-px-sm">
          <q-btn
            class="full-width"
            color="primary"
            label="جستجو در مشاغل"
            to="/jobs"
          />
        </div>
      </div>

      <!-- New Jobs For User -->

      <div
        class="text-weight-bold col-12 q-mb-md"
        style="font-size: 20px; height: 50px; margin-top: 55px"
      >
        تازه‌ترین آگهی‌های شغلی برای شما
      </div>

      <div class="col-12 row">
        <q-tabs
          class="text-bold"
          style="height: 50px"
          active-color="primary"
          content-class="text-bold"
          inline-label
          v-model="tab"
        >
          <q-tab class="text-bold" name="suggestions">
            <q-icon class="q-pr-md" size="24px" name="lightbulb" />
            <span>مشاغل پیشنهادی</span>
          </q-tab>

          <q-tab content-class="text-bold" name="history">
            <q-icon class="q-pr-md" size="24px" name="history" />
            <span>آخرین جستجوی یوزر</span>
          </q-tab>
        </q-tabs>
      </div>

      <q-tab-panels
        class="full-width"
        v-model="tab"
        animated
        swipeable
        vertical
        transition-prev="jump-up"
        transition-next="jump-up"
      >
        <q-tab-panel
          class="row justify-between"
          name="suggestions"
          style="font-size: 16px"
        >
          <!-- <div class="col-12 text-grey-6 q-my-md">
            پیشنهاد شده بر اساس رفتار و عملکرد شما
          </div> -->

          <div
            class="q-px-sm q-my-md col-12"
            v-for="(job, index) in jobs"
            :key="'job-' + index + 1"
          >
            <q-card style="background-color: transparent" flat bordered>
              <!-- Job`s Tags -->

              <div class="row justify-between" v-if="job.tags">
                <div class="row col-12">
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
              </div>

              <q-card-section horizontal>
                <q-card-section
                  class="col-xs-3 col-sm-1 flex flex-center q-px-md"
                >
                  <q-img
                    class="rounded-borders"
                    style="width: 48px; height: 48px"
                    :src="
                      'http://127.0.0.1:8000/storage/companyImages/' + job.image
                    "
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
                <q-btn flat class="font-13 text-grey-6">
                  {{ timeSincePosted(job.created_at) }}</q-btn
                >

                <q-space />

                <q-btn color="positive" label="ارسال رزومه" />
              </q-card-actions>
            </q-card>
          </div>
        </q-tab-panel>

        <q-tab-panel name="history"> </q-tab-panel>
      </q-tab-panels>

      <div class="col-12 q-mt-lg q-mb-sm row justify-center">
        <q-btn
          outline
          color="black"
          icon-right="keyboard_backspace"
          label="مشاهده همه"
          to="jobs"
        />
      </div>

      <!-- Some Explanations About App -->

      <q-card
        flat
        class="q-mt-md col-12 row justify-center content-center items-center q-py-xl"
      >
        <div class="col-12 global-emplyment">
          <q-card-section class="row text-center q-gutter-y-lg">
            <div class="col-12 q-py-md" style="padding-top: 3rem !important">
              <q-img
                style="width: 40%; height: 100%"
                src="https://jobvision.ir/assets/images/home-page/global-employment.svg"
              />
            </div>

            <q-card-section class="col-12">
              <div class="text-bold text-h5 q-pb-xs">
                استخدام‌های سراسری و دولتی
              </div>
              <div class="q-py-md text-grey-7">
                در این قسمت، آخرین فرصت‌های استخدام سراسری و دولتی به‌طور مرتب
                به‌روزرسانی و منتشر می‌شوند. به صفحه استخدام‌های سراسری سر بزنید
                و از بررسی روزانه ده‌ها سایت و مرجع خبری دیگر بی‌نیاز شوید.
              </div>

              <q-btn
                class="q-my-md text-bold"
                outline
                color="black"
                label="مشاهده فرصت های شغلی"
                to="jobs"
              />
            </q-card-section>
          </q-card-section>
        </div>
      </q-card>
    </div>
  </q-page>
</template>

<script>
import { ref, onMounted } from "vue";
import dayjs from "dayjs";

import { api } from "src/boot/axios";
import { useRouter } from "vue-router";

const stringOptions = [
  "Website",
  "Logo",
  "Golestan",
  "Tehran",
  "Esfehan",
  "Google",
  "Facebook",
  "Twitter",
  "Apple",
  "Oracle",
  "Your MUM",
  "Your",
  "MUM",
  "Tehran",
  "Iran",
  "Tehran, Iran",
];

export default {
  setup() {
    const isLoading = ref(true);
    const title = ref();
    const group = ref();
    const location = ref();
    const router = useRouter();
    const user = ref();

    const options = ref(stringOptions);
    const jobs = ref([]);
    const timeSincePosted = (postedDate) => {
      const now = dayjs();
      const posted = dayjs(postedDate);

      if (!posted.isValid()) {
        console.error("Invalid Date:", postedDate);
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

    async function getData() {
      try {
        const userResponse = await api.get("api/user");
        user.value = userResponse.data;
      } catch (err) {
        if (err.response && err.response.status === 401) {
          console.error("User not authenticated.");
        } else {
          console.error("Error fetching data:", err);
        }
      }

      if (user.value) {
        const jobsResponse = await api.get("api/loggedIn/jobs");
        jobs.value = jobsResponse.data;
      } else {
        const jobsResponse = await api.get("api/jobs");
        jobs.value = jobsResponse.data;
      }
    }

    function like(jobId) {
      api
        .post("api/like", {
          job_id: jobId,
        })
        .then((r) => {
          jobs.value = r.data;
        })
        .catch((err) => {
          console.log(err);
        });
    }

    function search() {
      localStorage.setItem("searchTitle", title.value || "");
      localStorage.setItem("searchGroup", group.value || "");
      localStorage.setItem("searchLocation", location.value || "");

      router.push("/jobs");
    }

    onMounted(() => {
      getData();
      // setTimeout(() => {
      //   isLoading.value = false;
      // }, 2000);
    });

    return {
      user,
      jobs,
      like,
      title,
      group,
      search,
      options,
      location,
      isLoading,
      stringOptions,
      timeSincePosted,
      model: ref(null),
      tab: ref("suggestions"),
      filterFn(val, update) {
        if (val === "") {
          update(() => {
            options.value = stringOptions;
          });
          return;
        }

        update(() => {
          const needle = val.toLowerCase();
          options.value = stringOptions.filter(
            (v) => v.toLowerCase().indexOf(needle) > -1
          );
        });
      },
    };
  },
};
</script>

<style scoped>
.q-tab-panel {
  padding: 0;
}

.q-card--bordered {
  border: 2px solid #dde1e6;
  border-radius: 12px;
}

.global-emplyment {
  border-radius: 10px;
  background-color: #f6f7f9 !important;
}

.text-muted {
  color: #8e9cb2 !important;
}

[dir="rtl"] .q-item__section--side {
  padding-left: 0;
}

.q-tab-panels {
  background: transparent;
}
</style>
