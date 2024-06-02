<template>
  <q-page style="background-color: #f8f9fa">
    <!-- Medium-4k Screen Content -->

    <div class="row justify-center content-center gt-sm">
      <div
        class="col-12 row justify-center q-px-xl"
        style="background-color: white"
      >
        <div class="col-md-12 col-lg-8 col-xl-8">
          <div class="row justify-center content-center items-center q-my-md">
            <div class="col-12 row">
              <q-select
                hide-dropdown-icon
                class="col-3"
                outlined
                v-model="model"
                :options="options"
                label="عنوان شغلی یا شرکت"
                use-input
                hide-selected
                fill-input
              >
                <template v-slot:prepend>
                  <q-icon name="search" />
                </template>
              </q-select>

              <q-select
                class="col-3"
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
                class="col-4 q-px-sm"
                hide-dropdown-icon
                outlined
                v-model="model"
                :options="options"
                label="شهر"
                use-input
                hide-selected
                fill-input
              >
                <template v-slot:prepend>
                  <q-icon name="location_on" />
                </template>
              </q-select>

              <q-btn
                color="primary"
                label="جستجو در مشاغل"
                to="/jobs"
                class="col-2 q-px-sm text-weight-bold"
                style="height: 55px"
              />
            </div>

            <div class="col-12 row">
              <q-btn
                outline
                class="q-my-sm q-mx-xs"
                style="border-radius: 24px"
                label="دورکاری"
              />

              <q-btn
                outline
                class="q-my-sm q-mx-xs"
                style="border-radius: 24px"
                label="کارآموزی"
              />

              <q-btn-dropdown
                class="q-my-sm q-mx-xs"
                rounded
                outline
                label="نوع همکاری"
                dropdown-icon="expand_more"
              >
                <q-option-group
                  v-model="group"
                  :options="optionss"
                  color="primary"
                />
              </q-btn-dropdown>

              <q-btn-dropdown
                class="q-my-sm q-mx-xs"
                rounded
                outline
                label="حقوق"
                dropdown-icon="expand_more"
              >
                <q-option-group
                  v-model="group"
                  :options="optionss"
                  color="primary"
                />
              </q-btn-dropdown>

              <q-btn-dropdown
                class="q-my-sm q-mx-xs"
                rounded
                outline
                label="زمان انتشار"
                dropdown-icon="expand_more"
              >
                <q-option-group
                  v-model="group"
                  :options="optionss"
                  color="primary"
                />
              </q-btn-dropdown>
              <q-btn-dropdown
                class="q-my-sm q-mx-xs"
                rounded
                outline
                label="سابقه کار"
                dropdown-icon="expand_more"
              >
                <q-option-group
                  v-model="group"
                  :options="optionss"
                  color="primary"
                />
              </q-btn-dropdown>
              <q-btn-dropdown
                class="q-my-sm q-mx-xs"
                rounded
                outline
                label="سطح ارشدیت"
                dropdown-icon="expand_more"
              >
                <q-option-group
                  v-model="group"
                  :options="optionss"
                  color="primary"
                />
              </q-btn-dropdown>
              <q-btn-dropdown
                class="q-my-sm q-mx-xs"
                rounded
                outline
                label="مزایا و تسحیلات"
                dropdown-icon="expand_more"
              >
                <q-option-group
                  v-model="group"
                  :options="optionss"
                  color="primary"
                />
              </q-btn-dropdown>
              <q-btn-dropdown
                class="q-my-sm q-mx-xs"
                rounded
                outline
                label="صنعت"
                dropdown-icon="expand_more"
              >
                <q-option-group
                  v-model="group"
                  :options="optionss"
                  color="primary"
                />
              </q-btn-dropdown>

              <q-btn
                outline
                class="q-my-sm q-mx-xs"
                style="border-radius: 24px"
                label="امکان استعلام معلولین"
              />

              <q-btn
                outline
                class="q-my-sm q-mx-xs"
                style="border-radius: 24px"
                label="امریه سربازی"
              />
            </div>
          </div>
        </div>
      </div>

      <div class="col-12 row justify-center q-my-md q-px-xl">
        <div class="col-md-12 col-lg-8 col-xl-8">
          <div class="row justify-between items-start content-center q-my-md">
            <div class="col-6 q-px-sm row justify-center">
              <q-btn
                color="primary"
                class="col-12 q-mb-sm"
                label="فعال سازی اطلاع رسانی شغلی"
                icon="notification_add"
                style="height: 50px"
              />

              <div
                class="col-12 q-my-xs row justify-between items-center text-grey-7"
                style="background-color: white"
              >
                <div class="col-6 q-px-md">40396 فرصت شغلی فعال</div>

                <div class="col-6 q-px-md text-right">
                  مرتب سازی:

                  <q-btn-dropdown
                    class="q-my-sm"
                    outline
                    label="حقوق"
                    dropdown-icon="expand_more"
                  >
                    <q-option-group
                      v-model="group"
                      :options="optionss"
                      color="primary"
                    />
                  </q-btn-dropdown>
                </div>
              </div>

              <!-- Job Offers Cards -->

              <div
                class="bg-white q-py-sm q-my-sm col-12"
                v-for="(job, index) in jobs"
                :key="'job-' + index + 1"
              >
                <!-- Job`s Tags -->

                <div class="row justify-between" v-if="job.tagList">
                  <div class="col-9 row">
                    <q-badge
                      v-for="(tag, index) in job.tagList"
                      :key="index"
                      class="q-my-xs q-mx-xs q-py-sm"
                      :color="tag.important ? 'red-2' : 'indigo-1'"
                      :text-color="tag.important ? 'negative' : 'primary'"
                      :label="tag.label"
                    />
                  </div>
                </div>

                <q-card flat>
                  <q-card-section horizontal>
                    <q-card-section class="col-3 flex flex-center">
                      <q-img
                        class="rounded-borders"
                        :src="job.image"
                        style="width: 48px; height: 48px"
                      />
                    </q-card-section>

                    <q-card-section class="col-9">
                      <div
                        class="q-mt-sm q-mb-xs row justify-between items-center q-pr-sm"
                      >
                        <div class="col-sm-9 col-10">{{ job.title }}</div>

                        <div class="col-sm-3 col-2">
                          <q-btn flat icon="favorite_outline" />
                        </div>
                      </div>

                      <div class="text-caption" v-if="job.company">
                        {{ job.company }}
                      </div>

                      <div class="text-caption text-grey row">
                        <div>
                          {{ job.location }}
                        </div>

                        <div class="row" v-if="job.rightsMin">
                          <span class="q-px-sm">|</span>

                          <p v-if="job.rightsMax">
                            {{ job.rightsMin }} - {{ job.rightsMax }}
                          </p>
                          <p v-else>{{ job.rightsMin }}+</p>
                        </div>
                      </div>
                    </q-card-section>
                  </q-card-section>

                  <div class="q-px-sm">
                    <q-btn flat> {{ timeSincePosted(job.postedDate) }}</q-btn>
                  </div>
                </q-card>
              </div>

              <!-- Job Offers Tabs -->

              <div class="col-12 row justify-center items-center q-my-md">
                <q-tabs
                  active-class="active-tab"
                  indicator-color="transparent"
                  model="tab"
                >
                  <q-tab
                    class="q-mx-xs text-black q-pb-sm"
                    style="background: white; border-radius: 8px; width: 60px"
                    name="firstPage"
                    label="اولین"
                  />

                  <q-separator vertical inset />

                  <q-tab
                    class="q-mx-xs text-black"
                    style="background: white; border-radius: 8px; width: 40px"
                    name="pageTwo"
                    label="1"
                  />

                  <q-tab
                    class="q-mx-xs text-black"
                    style="background: white; border-radius: 8px; width: 40px"
                    name="pageThree"
                    label="2"
                  />

                  <q-tab
                    class="q-mx-xs text-black"
                    style="background: white; border-radius: 8px; width: 40px"
                    name="pageFour"
                    label="3"
                  />

                  <q-separator vertical inset />

                  <q-tab
                    class="q-mx-xs text-black q-pb-sm"
                    style="background: white; border-radius: 8px; width: 60px"
                    name="lastPage"
                    label="آخرین"
                  />
                </q-tabs>
              </div>
            </div>

            <!-- Sidebar -->

            <div
              class="col-6 q-px-sm row justify-center"
              style="
                background-color: white;
                position: sticky;
                z-index: 10px;
                max-height: calc(100vh - 90px);
                overscroll-behavior: contain;
              "
            >
              <q-card
                class="col-8 row justify-center q-my-xl q-my-xl q-px-md q-pa-md"
              >
                <div
                  class="text-weight-bold text-primary q-my-md"
                  style="font-size: 18px"
                >
                  اطلاع رسانی شغلی
                </div>

                <div class="text-weight-medium q-my-md">
                  عنوان شغلی و شهر مورد نظر خود را وارد نمایید و جدیدترین آگهی
                  های شغلی را در ایمیل خود دریافت کنید.
                </div>

                <q-input
                  filled
                  class="col-12 q-px-md q-my-sm"
                  label="عنوان شغل"
                />

                <q-input filled class="col-12 q-px-md q-my-sm" label="شهر">
                  <template v-slot:prepend>
                    <q-icon name="location_on" />
                  </template>
                </q-input>
              </q-card>
            </div>
          </div>
        </div>
      </div>

      <!-- Swipers -->

      <div class="col-12 q-mb-xl q-mt-sm q-px-xl">
        <swiper
          class="col-12 row gt-sm lt-lg"
          :slidesPerView="3"
          :centeredSlides="false"
          :spaceBetween="5"
          :modules="modules"
          :autoplay="{
            delay: 2500,
            disableOnInteraction: false,
          }"
        >
          <swiper-slide class="col-12 row q-px-xs">
            <div class="col-12">
              <q-card class="row justify-center q-pa-sm companies-card">
                <div class="col-12 row q-ma-sm q-px-sm">
                  <q-img
                    class="col-12"
                    src="/assets/logo.svg"
                    style="width: 75px; height: 100px"
                  />

                  <div class="col-12 row">
                    <div class="col-12">نام شرکت</div>

                    <div class="col-12">
                      <q-badge class="q-my-xs">
                        5.0
                        <q-icon name="star" color="yellow" class="q-ml-xs" />
                      </q-badge>
                    </div>

                    <div class="col-12 q-mt-md">
                      <div class="text-primary">
                        4 اگهی شغلی فعال
                        <q-icon
                          name="keyboard_backspace"
                          size="16px"
                          class="q-ml-sm q-mt-xs"
                        />
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-12 row q-mt-md q-px-sm q-py-xs">
                  <q-btn
                    unelevated
                    class="col"
                    color="blue-grey-11"
                    text-color="black"
                    icon="add"
                    label="دنبال کنید"
                  />
                </div>
              </q-card>
            </div>
          </swiper-slide>
        </swiper>

        <swiper
          class="col-12 row gt-md"
          :slidesPerView="5"
          :centeredSlides="false"
          :spaceBetween="5"
          :modules="modules"
          :autoplay="{
            delay: 2500,
            disableOnInteraction: false,
          }"
        >
          <swiper-slide class="col-12 row q-px-xs">
            <div class="col-12">
              <q-card class="row justify-center q-pa-sm companies-card">
                <div class="col-12 row q-ma-sm q-px-sm">
                  <q-img
                    class="col-12"
                    src="/assets/logo.svg"
                    style="width: 75px; height: 100px"
                  />

                  <div class="col-12 row">
                    <div class="col-12">نام شرکت</div>

                    <div class="col-12">
                      <q-badge class="q-my-xs">
                        5.0
                        <q-icon name="star" color="yellow" class="q-ml-xs" />
                      </q-badge>
                    </div>

                    <div class="col-12 q-mt-md">
                      <div class="text-primary">
                        4 اگهی شغلی فعال
                        <q-icon
                          name="keyboard_backspace"
                          size="16px"
                          class="q-ml-sm q-mt-xs"
                        />
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-12 row q-mt-md q-px-sm q-py-xs">
                  <q-btn
                    unelevated
                    class="col"
                    color="blue-grey-11"
                    text-color="black"
                    icon="add"
                    label="دنبال کنید"
                  />
                </div>
              </q-card>
            </div>
          </swiper-slide>
        </swiper>
      </div>
    </div>

    <!-- Extra Small Screen Content -->

    <div class="row justify-center content-center lt-md">
      <!-- Header Content -->

      <div class="col-12 row justify-center" style="background-color: white">
        <div class="col-12 q-px-md">
          <div class="row justify-center content-center items-center q-my-md">
            <!-- Inputs -->

            <div class="col-12 row">
              <q-select
                hide-dropdown-icon
                class="col-6"
                outlined
                v-model="model"
                :options="options"
                label="عنوان شغلی یا شرکت"
                use-input
                hide-selected
                fill-input
              >
                <template v-slot:prepend>
                  <q-icon name="search" />
                </template>
              </q-select>

              <q-select
                class="col-6"
                outlined
                v-model="model"
                :options="options"
                label="گروه شغلی"
              >
                <template v-slot:prepend>
                  <q-icon name="work" />
                </template>
              </q-select>
            </div>

            <!-- Filters List -->

            <div
              class="col-12 row q-mt-md"
              style="height: 40px; overflow: scroll"
            >
              <q-btn
                outline
                class="q-my-sm q-mx-xs"
                style="border-radius: 24px"
                label="دورکاری"
              />

              <q-btn
                outline
                class="q-my-sm q-mx-xs"
                style="border-radius: 24px"
                label="کارآموزی"
              />

              <q-btn-dropdown
                class="q-my-sm q-mx-xs"
                rounded
                outline
                label="نوع همکاری"
                dropdown-icon="expand_more"
              >
                <q-option-group
                  v-model="group"
                  :options="optionss"
                  color="primary"
                />
              </q-btn-dropdown>

              <q-btn-dropdown
                class="q-my-sm q-mx-xs"
                rounded
                outline
                label="حقوق"
                dropdown-icon="expand_more"
              >
                <q-option-group
                  v-model="group"
                  :options="optionss"
                  color="primary"
                />
              </q-btn-dropdown>

              <q-btn-dropdown
                class="q-my-sm q-mx-xs"
                rounded
                outline
                label="زمان انتشار"
                dropdown-icon="expand_more"
              >
                <q-option-group
                  v-model="group"
                  :options="optionss"
                  color="primary"
                />
              </q-btn-dropdown>
              <q-btn-dropdown
                class="q-my-sm q-mx-xs"
                rounded
                outline
                label="سابقه کار"
                dropdown-icon="expand_more"
              >
                <q-option-group
                  v-model="group"
                  :options="optionss"
                  color="primary"
                />
              </q-btn-dropdown>
              <q-btn-dropdown
                class="q-my-sm q-mx-xs"
                rounded
                outline
                label="سطح ارشدیت"
                dropdown-icon="expand_more"
              >
                <q-option-group
                  v-model="group"
                  :options="optionss"
                  color="primary"
                />
              </q-btn-dropdown>
              <q-btn-dropdown
                class="q-my-sm q-mx-xs"
                rounded
                outline
                label="مزایا و تسحیلات"
                dropdown-icon="expand_more"
              >
                <q-option-group
                  v-model="group"
                  :options="optionss"
                  color="primary"
                />
              </q-btn-dropdown>
              <q-btn-dropdown
                class="q-my-sm q-mx-xs"
                rounded
                outline
                label="صنعت"
                dropdown-icon="expand_more"
              >
                <q-option-group
                  v-model="group"
                  :options="optionss"
                  color="primary"
                />
              </q-btn-dropdown>

              <q-btn
                outline
                class="q-my-sm q-mx-xs"
                style="border-radius: 24px"
                label="امکان استعلام معلولین"
              />

              <q-btn
                outline
                class="q-my-sm q-mx-xs"
                style="border-radius: 24px"
                label="امریه سربازی"
              />
            </div>
          </div>
        </div>
      </div>

      <!-- Page Content -->

      <div class="col-12 row justify-center q-my-md">
        <div class="col-12 q-px-md">
          <div class="row justify-between items-start content-center q-my-md">
            <div class="col-12 q-px-sm row justify-center">
              <!-- Notifications Button -->

              <q-btn
                color="primary"
                class="col-12 fixed-bottom"
                label="فعال سازی اطلاع رسانی شغلی"
                icon="notification_add"
                style="height: 50px; z-index: 9999999"
              />

              <div
                class="col-12 q-my-xs row justify-between items-center text-grey-7"
              >
                <div class="col-6 q-px-md">
                  <div>40396</div>
                  فرصت شغلی فعال
                </div>

                <div class="col-6 flex justify-end">
                  <div class="q-px-md">مرتب سازی:</div>

                  <q-btn-dropdown
                    class="q-mb-sm"
                    outline
                    label="حقوق"
                    dropdown-icon="expand_more"
                  >
                    <q-option-group
                      v-model="group"
                      :options="optionss"
                      color="primary"
                    />
                  </q-btn-dropdown>
                </div>
              </div>

              <!-- Job Offers -->

              <div class="col-12 q-my-xs row justify-center items-center">
                <!-- Job Offers Cards -->

                <div
                  class="bg-white q-py-sm q-my-sm col-12"
                  v-for="(job, index) in jobs"
                  :key="'job-' + index + 1"
                >
                  <!-- Job`s Tags -->

                  <div class="row justify-between" v-if="job.tagList">
                    <div class="row col-12">
                      <div class="col-10">
                        <q-badge
                          v-for="(tag, index) in job.tagList"
                          :key="index"
                          class="q-my-xs q-mx-xs q-py-sm"
                          :color="tag.important ? 'red-2' : 'indigo-1'"
                          :text-color="tag.important ? 'negative' : 'primary'"
                          :label="tag.label"
                        />
                      </div>

                      <div class="col-2 text-right">
                        <q-btn flat icon="favorite_outline" />
                      </div>
                    </div>
                  </div>

                  <q-card flat>
                    <q-card-section horizontal>
                      <q-card-section
                        class="col-xs-5 col-sm-2 flex flex-center"
                      >
                        <q-img
                          class="rounded-borders"
                          :src="job.image"
                          style="width: 48px; height: 48px"
                        />
                      </q-card-section>

                      <q-card-section class="col-xs-7 cl-sm-10">
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

                            <p v-if="job.rightsMax">
                              {{ job.rightsMin }} - {{ job.rightsMax }}
                            </p>
                            <p v-else>{{ job.rightsMin }}+</p>
                          </div>
                        </div>
                      </q-card-section>
                    </q-card-section>

                    <div class="q-px-sm">
                      <q-btn flat> {{ timeSincePosted(job.postedDate) }}</q-btn>
                    </div>
                  </q-card>
                </div>
              </div>

              <!-- Job Offers Tabs -->

              <div class="col-12 row justify-center items-center q-my-md">
                <q-tabs
                  active-class="active-tab"
                  indicator-color="transparent"
                  v-model="tab"
                >
                  <q-tab
                    class="q-mx-xs text-black q-pb-sm"
                    style="background: white; border-radius: 8px; width: 60px"
                    name="firstPage"
                    label="اولین"
                  />

                  <q-separator vertical inset />

                  <q-tab
                    class="q-mx-xs text-black"
                    style="background: white; border-radius: 8px; width: 40px"
                    name="pageTwo"
                    label="1"
                  />

                  <q-tab
                    class="q-mx-xs text-black"
                    style="background: white; border-radius: 8px; width: 40px"
                    name="pageThree"
                    label="2"
                  />

                  <q-tab
                    class="q-mx-xs text-black"
                    style="background: white; border-radius: 8px; width: 40px"
                    name="pageFour"
                    label="3"
                  />

                  <q-separator vertical inset />

                  <q-tab
                    class="q-mx-xs text-black q-pb-sm"
                    style="background: white; border-radius: 8px; width: 60px"
                    name="lastPage"
                    label="آخرین"
                  />
                </q-tabs>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </q-page>
</template>

<script>
import { ref } from "vue";
import { Swiper, SwiperSlide } from "swiper/vue";
import "swiper/css";

import "swiper/css/navigation";
import "swiper/css/autoplay";

import { Autoplay, Navigation } from "swiper/modules";

import { getJobs } from "../../../composables/getJobs";

export default {
  components: {
    Swiper,
    SwiperSlide,
  },
  setup() {
    const jobs = getJobs();
    const timeSincePosted = (postedDate) => {
      const now = new Date();
      const posted = new Date(postedDate);
      const diffInMilliseconds = now - posted;
      const diffInHours = Math.floor(diffInMilliseconds / (1000 * 60 * 60));
      const diffInDays = Math.floor(diffInHours / 24);

      if (diffInDays > 0) {
        return `${diffInDays} روز پیش`;
      } else {
        return `${diffInHours} ساعت پیش`;
      }
    };

    return {
      jobs,
      timeSincePosted,
      model: ref(null),
      tab: ref("firstPage"),
      group: ref("op1"),
      options: ["Google", "Facebook", "Twitter", "Apple", "Oracle"],
      optionss: [
        {
          label: "Option 1",
          value: "op1",
        },
        {
          label: "Option 2",
          value: "op2",
        },
        {
          label: "Option 3",
          value: "op3",
        },
      ],
      slide: ref(1),
      modules: [Autoplay, Navigation],
    };
  },
};
</script>

<style scoped>
.q-btn--outline:before {
  border: 1px solid #ebebeb;
}

.q-item {
  padding: 0;
}

.q-carousel {
  background-color: #f8f9fa;
}

.companies-card {
  border: 2px solid #dde1e6;
  border-radius: 16px;
}

.active-tab {
  background-color: #5660f2 !important;
  color: white !important;
}
</style>
