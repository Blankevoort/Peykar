<template>
  <q-page style="background-color: #f8f9fa">
    <!-- Medium-4k Screen Content -->

    <div class="row justify-center content-center gt-sm">
      <div
        class="col-12 row justify-center q-px-xl"
        style="background-color: white"
      >
        <div class="col-md-12 col-lg-8 col-xl-7">
          <div class="row justify-center content-center items-center q-my-md">
            <div class="col-12 row">
              <div class="col-3 q-gutter-y-sm">
                <div class="text-grey-6 font-12">عنوان شغلی یا شرکت ...</div>

                <q-select
                  hide-dropdown-icon
                  outlined
                  v-model="title"
                  :options="options"
                  use-input
                  hide-selected
                  fill-input
                >
                  <template v-slot:prepend>
                    <q-icon name="search" />
                  </template>
                </q-select>
              </div>

              <div class="col-3 q-gutter-y-sm">
                <div class="text-grey-6 font-12">گروه شغلی</div>

                <q-select outlined v-model="group" :options="options">
                  <template v-slot:prepend>
                    <q-icon name="work" />
                  </template>
                </q-select>
              </div>

              <div class="col-4 q-px-sm q-gutter-y-sm">
                <div class="text-grey-6 font-12">شهر</div>

                <q-select
                  hide-dropdown-icon
                  outlined
                  v-model="location"
                  :options="options"
                  use-input
                  hide-selected
                  fill-input
                >
                  <template v-slot:prepend>
                    <q-icon name="location_on" />
                  </template>
                </q-select>
              </div>

              <div class="col-2 q-px-sm flex items-end">
                <q-btn
                  color="primary"
                  label="جستجو در مشاغل"
                  to="/jobs"
                  class="text-weight-bold"
                  style="height: 45px"
                />
              </div>
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
        <div class="col-md-12 col-lg-7 col-xl-7">
          <div class="row justify-between items-start content-center q-my-md">
            <div class="col-5 q-px-sm row justify-center">
              <q-btn
                color="primary"
                class="col-12 q-mb-sm"
                label="فعال سازی اطلاع رسانی شغلی"
                icon="notification_add"
                style="height: 50px"
              />

              <div
                class="col-12 q-my-xs row justify-between items-center text-grey-8"
              >
                <div class="col-6">
                  <span class="text-bold">40,396</span> فرصت شغلی فعال
                </div>

                <div class="col-6 text-right">
                  <q-btn-dropdown
                    class="q-my-sm text-black"
                    :label="filter"
                    flat
                    dense
                  >
                    <q-tabs
                      vertical
                      active-class="active-sort-type"
                      indicator-color="transparent"
                      v-model="filter"
                    >
                      <q-tab
                        class="q-mx-xs q-my-xs text-black"
                        style="border-radius: 8px"
                        name="جدیدترین"
                        label="جدیدترین"
                      />

                      <q-tab
                        class="q-mx-xs q-my-xs text-black"
                        style="border-radius: 8px"
                        name="مرتبط‌ترین"
                        label="مرتبط‌ترین"
                      />

                      <q-tab
                        class="q-mx-xs q-my-xs text-black"
                        style="border-radius: 8px"
                        name="بیشترین حقوق"
                        label="بیشترین حقوق"
                      />
                    </q-tabs>
                  </q-btn-dropdown>
                </div>
              </div>

              <!-- Job Offers Cards -->

              <div
                class="q-py-sm q-my-sm col-12"
                v-for="(job, index) in jobs"
                :key="'job-' + index + 1"
              >
                <q-card class="br-10" flat bordered>
                  <!-- Job`s Tags -->

                  <div class="row justify-between" v-if="job.tags">
                    <div class="row col-12">
                      <div class="row col-12">
                        <div
                          class="col-10"
                          @click="$router.push('/job/' + job.id)"
                        >
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
                    <q-card-section class="col-xs-5 col-sm-3 flex flex-center">
                      <q-img
                        class="rounded-borders"
                        :src="
                          'http://127.0.0.1:8000/storage/companyImages/' +
                          job.image
                        "
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

                          <p class="text-positive" v-else>
                            {{ job.rightsMin }}+
                          </p>
                        </div>

                        <div class="col-12 q-pb-sm">
                          <div flat class="font-13 text-grey-6">
                            {{ timeSincePosted(job.created_at) }}
                          </div>
                        </div>
                      </div>
                    </q-card-section>
                  </q-card-section>
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

            <div class="col-7 q-px-sm bg-white sticky-sidebar">
              <div class="row justify-center">
                <q-card
                  class="col-8 row justify-center q-my-xl q-my-xl q-px-md q-pa-md"
                  style="
                    border: 1px solid #eef0f4;
                    border-radius: 10px !important;
                  "
                  flat
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
                    placeholder="عنوان شغل"
                  />

                  <q-input
                    filled
                    class="col-12 q-px-md q-my-sm"
                    placeholder="شهر"
                  >
                    <template v-slot:prepend>
                      <q-icon name="location_on" />
                    </template>
                  </q-input>
                </q-card>
              </div>
            </div>
          </div>
        </div>
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
              <div class="col-6 q-gutter-y-sm">
                <div class="text-grey-6 font-12">عنوان شغلی یا شرکت</div>

                <q-select
                  hide-dropdown-icon
                  outlined
                  v-model="model"
                  :options="options"
                  use-input
                  hide-selected
                  fill-input
                >
                  <template v-slot:prepend>
                    <q-icon name="search" />
                  </template>
                </q-select>
              </div>
              <div class="col-6 q-gutter-y-sm">
                <div class="text-grey-6 font-12">گروه شغلی</div>

                <q-select
                  class="col-6"
                  outlined
                  v-model="model"
                  :options="options"
                >
                  <template v-slot:prepend>
                    <q-icon name="work" />
                  </template>
                </q-select>
              </div>
            </div>

            <!-- Filters List -->

            <div
              class="col-12 row q-mt-md"
              style="height: 60px; overflow-x: scroll"
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

      <div class="col-12 row justify-center q-mb-md">
        <div class="col-12 q-px-md">
          <div class="row justify-between items-start content-center q-my-md">
            <div class="col-12 q-px-sm row justify-center">
              <!-- Notifications Button -->

              <q-btn
                color="primary"
                class="col-12 fixed-bottom"
                label="فعال سازی اطلاع رسانی شغلی"
                icon="notification_add"
                style="height: 50px; z-index: 9999"
              />

              <!-- Sorting options And Job offers Count -->

              <div
                class="col-12 q-my-xs row justify-between items-center text-grey-7"
              >
                <div class="col-6 q-px-md">
                  <span class="text-grey-7 text-bold font-11">40,396</span>

                  <span class="text-grey-7 font-11"> فرصت شغلی فعال </span>
                </div>

                <div class="col-6 flex justify-end">
                  <q-btn-dropdown
                    class="q-my-sm text-black font-11"
                    label="منطبق ترین"
                    flat
                  >
                    <q-tabs
                      vertical
                      active-class="active-sort-type"
                      indicator-color="transparent"
                      v-model="tab"
                    >
                      <q-tab
                        class="q-mx-xs q-my-xs text-black"
                        style="border-radius: 8px"
                        name="recent"
                        label="جدیدترین"
                      />

                      <q-tab
                        class="q-mx-xs q-my-xs text-black"
                        style="border-radius: 8px"
                        name="suitable"
                        label="منطبق ترین"
                      />

                      <q-tab
                        class="q-mx-xs q-my-xs text-black"
                        style="border-radius: 8px"
                        name="mostSalary"
                        label="بیشترین حقوق"
                      />
                    </q-tabs>
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
                          v-for="(tag, index) in job.tags"
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

                  <q-card style="background-color: transparent" flat>
                    <!-- Job`s Tags -->

                    <div class="row justify-between" v-if="job.tags">
                      <div class="row col-12">
                        <div class="col-10">
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

                    <q-card-section horizontal>
                      <q-card-section
                        class="col-xs-3 col-sm-1 flex flex-center q-px-md"
                      >
                        <q-img
                          class="rounded-borders"
                          style="width: 48px; height: 48px"
                          :src="
                            'http://127.0.0.1:8000/storage/companyImages/' +
                            job.image
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

                            <p class="text-positive" v-else>
                              {{ job.rightsMin }}+
                            </p>
                          </div>

                          <div class="col-12 q-pb-sm">
                            <div flat class="font-13 text-grey-6">
                              {{ timeSincePosted(job.created_at) }}
                            </div>
                          </div>
                        </div>
                      </q-card-section>
                    </q-card-section>
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
import { onMounted, ref } from "vue";
import dayjs from "dayjs";

import { api } from "src/boot/axios";

export default {
  setup() {
    const title = ref("");
    const group = ref("");
    const location = ref("");
    const filter = ref("مرتبط‌ترین");
    const jobs = ref([]);
    const user = ref();
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

    const fetchJobsByIds = async (ids) => {
      jobs.value = [];
      try {
        for (const id of ids) {
          const response = await api.get(`api/job/${id}`);
          jobs.value.push(response.data);
        }
      } catch (err) {
        console.error(err);
      }
    };

    onMounted(async () => {
      const searchTitle = localStorage.getItem("searchTitle");
      const searchGroup = localStorage.getItem("searchGroup");
      const searchLocation = localStorage.getItem("searchLocation");

      if (searchTitle || searchGroup || searchLocation) {
        title.value = searchTitle || "";
        group.value = searchGroup || "";
        location.value = searchLocation || "";

        try {
          const searchResponse = await api.post("api/search/jobs", {
            title: title.value,
            group: group.value,
            location: location.value,
          });

          const jobIds = searchResponse.data;

          if (jobIds.length > 0) {
            await fetchJobsByIds(jobIds);
          } else {
            jobs.value = [];
          }
          localStorage.removeItem("searchTitle");
          localStorage.removeItem("searchGroup");
          localStorage.removeItem("searchLocation");
        } catch (err) {
          console.error(err);
        }
      } else {
        getData();
      }
    });

    return {
      jobs,
      user,
      title,
      group,
      filter,
      location,
      timeSincePosted,
      model: ref(null),
      tab: ref("firstPage"),
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

.q-field__control {
  display: flex;
  align-items: center;
  height: 40px;
  font-size: 40px;
}

.sticky-sidebar {
  height: 132ch;
  position: sticky;
  top: 75px;
  bottom: 75px;
  align-self: flex-start;
}
</style>
