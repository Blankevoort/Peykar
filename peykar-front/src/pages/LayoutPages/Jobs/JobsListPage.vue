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
                <JobCard
                  :job="job"
                  :user="user"
                  :like="like"
                  :sendCV="sendCV"
                />
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
                  <JobCard
                    :job="job"
                    :user="user"
                    :like="like"
                    :sendCV="sendCV"
                  />
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
import { useQuasar } from "quasar";
import { useErrorHandler } from "src/composables/useErrorHandler";
import { onMounted, ref } from "vue";

import { api } from "src/boot/axios";
import JobCard from "components/JobCard.vue";

export default {
  components: {
    JobCard,
  },

  setup() {
    const $q = useQuasar();
    const { handleError } = useErrorHandler();
    const title = ref("");
    const group = ref("");
    const location = ref("");
    const filter = ref("مرتبط‌ترین");
    const jobs = ref([]);
    const user = ref();

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

    function like(jobId) {
      api
        .post("api/like", {
          job_id: jobId,
        })
        .then((r) => {
          if (r.data.status === 204) {
            $q.notify({
              message: r.data.message,
              color: "green",
              position: "bottom-left",
            });
          }
        })
        .catch(handleError);
    }

    function sendCV(jobId) {
      api
        .post("api/job/" + jobId + "/request")
        .then((r) => {
          if (r.data.status === 204) {
            $q.notify({
              message: "درخواست با موفقیت ارسال شد!",
              color: "green",
              position: "bottom-left",
            });
          } else if (r.data.status === 409) {
            $q.notify({
              message: "برای این موقعیت درخواست ارسال شده دارید",
              color: "red",
              position: "bottom-left",
            });
          }
        })
        .catch(handleError);
    }

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
      like,
      jobs,
      user,
      title,
      group,
      sendCV,
      filter,
      location,
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
