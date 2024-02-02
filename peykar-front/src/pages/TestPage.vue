<template>
  <q-page>
    <q-btn label="toggle share" @click="share = true" />

    <q-btn label="toggle about me" @click="editAbout = true" />

    <q-btn label="toggle picture change" @click="editPicture = true" />

    <q-btn label="toggle basic information" @click="information = true" />

    <!-- Forms And Dialogs -->

    <q-dialog class="q-pa-sm" v-model="share">
      <div class="relative-position bg-white q-pa-md" style="width: 600px">
        <div class="absolute-right q-pt-xs">
          <q-btn flat color="grey-6" icon="cancel" @click="share = false" />
        </div>

        <div class="full-width q-my-md">
          <span class="text-grey-7">آدرس یکتا رزومه شما</span>

          <div class="row justify-between q-my-sm q-px-xs">
            <div class="col-9">
              <q-input
                class="input-box"
                outlined
                color="grey-5"
                v-model="link"
              />
            </div>

            <div class="col-3 q-pl-md">
              <q-btn
                style="height: 45px"
                outline
                color="primary"
                label="کپی لینک"
                @click="copyLink"
              />
            </div>
          </div>
        </div>
      </div>
    </q-dialog>

    <q-dialog class="q-pa-sm" v-model="editAbout">
      <div class="bg-white q-pa-md" style="width: 800px !important">
        <div
          class="full-width relative-position row justify-center"
          style="height: 45px"
        >
          <div class="absolute-right q-pt-sm">
            <q-btn flat color="grey-6" @click="editAbout = false">
              <q-icon name="cancel" size="32px" />
            </q-btn>
          </div>

          <div class="absolute-center text-h6 text-bold">ویرایش درباره من</div>
        </div>

        <div class="q-pa-md">
          <div class="q-pt-sm">
            <div class="row items-center">
              <div class="col-7 row">
                <q-avatar size="69px">
                  <q-img
                    src="https://fileapi.jobvision.ir/StaticFiles/Candidate/DefaultImages/default-user-Male.png?v=20231122"
                  />
                </q-avatar>

                <div class="col-8 q-pl-md">
                  <div>تصویر پروفایل</div>

                  <div class="text-grey-6 q-py-sm">
                    ‌فرمت‌های JPG, PNG, SVG, JPEG(حداکثر ۵١۲ کیلوبایت)
                  </div>
                </div>
              </div>

              <div class="col-5">
                <q-btn
                  class="text-bold"
                  flat
                  color="primary"
                  label="بارگذاری تصویر پروفایل"
                  icon="upload"
                />
              </div>
            </div>
          </div>

          <div class="q-mt-md q-mb-sm">
            <div class="row justify-between items-center">
              <div class="col-6 q-px-sm">
                <div class="text-grey-7">
                  <span class="q-pb-sm">عنوان شغلی نمایشی</span>

                  <q-btn flat>
                    <q-icon name="info" size="18px" />
                    <q-tooltip anchor="center left" self="center right">
                      Here I am!
                    </q-tooltip>
                  </q-btn>
                </div>

                <q-input outlined v-model="title" />
              </div>

              <div class="col-6 q-px-sm flex justify-end q-mt-sm">
                <div class="text-grey-7 q-pb-sm">Job Title</div>

                <q-input class="full-width" outlined v-model="en.title" />
              </div>
            </div>
          </div>

          <div class="q-my-md">
            <div class="full-width flex items-center">
              <div class="q-pb-sm text-grey-7">آدرس پروفایل لینکدین شما</div>

              <q-input outlined v-model="linkedin" class="full-width" />
            </div>
          </div>

          <div>
            <div class="row justify-between items-center">
              <div class="col-6 q-px-sm">
                <div class="text-grey-7 row justify-between">
                  <span class="q-pb-sm">چند جمله درباره خود بنویسید</span>

                  <span class="q-pb-sm">xxxx / 1000</span>
                </div>

                <q-input outlined type="textarea" v-model="description" />
              </div>

              <div class="col-6 q-px-sm flex justify-end">
                <div class="text-grey-7 full-width row justify-between">
                  <span class="q-pb-sm">xxxx / 1000</span>

                  <span class="q-pb-sm">Describe Yourself</span>
                </div>

                <q-input
                  class="full-width"
                  outlined
                  type="textarea"
                  v-model="en.description"
                />
              </div>
            </div>
          </div>

          <div class="full-width relative-position q-mt-md q-pb-md">
            <div class="absolute-right">
              <q-btn flat color="grey-7" label="انصراف" />

              <q-btn color="primary" label="ذخیره تغییرات" />
            </div>
          </div>
        </div>
      </div>
    </q-dialog>

    <q-dialog class="q-pa-sm" v-model="editPicture">
      <div class="bg-white q-pa-md" style="width: 600px !important">
        <div class="full-width relative-position row" style="height: 45px">
          <div class="absolute-right q-pt-sm">
            <q-btn flat color="grey-6" @click="editPicture = false">
              <q-icon name="cancel" size="32px" />
            </q-btn>
          </div>

          <div class="text-h6 text-bold">تصویر پروفایل</div>
        </div>

        <div class="text-center q-pa-md">
          <q-avatar size="180px">
            <q-img
              src="https://fileapi.jobvision.ir/StaticFiles/Candidate/DefaultImages/default-user-Male.png?v=20231122"
            >
              <div
                class="absolute flex items-center justify-center"
                style="background-color: #acacac70; height: 100%"
              >
                <div>
                  <q-btn
                    flat
                    color="white"
                    label="بارگذاری تصویر"
                    icon="upload"
                  />
                </div>
              </div>
            </q-img>
          </q-avatar>

          <div class="q-mt-md text-grey-7">
            فرمت‌های JPG, PNG, SVG, JPEG(حداکثر ۵١۲ کیلوبایت)
          </div>
        </div>

        <div class="q-pb-md full-width">
          <q-separator />
        </div>

        <div class="full-width text-right">
          <q-btn color="primary" label="ذخیره تغییرات" />
        </div>
      </div>
    </q-dialog>

    <q-dialog v-model="information">
      <div class="bg-white" style="width: 800px !important; height: 602px">
        <div class="q-pa-md">
          <div
            class="full-width relative-position row justify-center"
            style="height: 45px"
          >
            <div class="absolute-right q-pt-sm">
              <q-btn flat color="grey-6" @click="editAbout = false">
                <q-icon name="cancel" size="32px" />
              </q-btn>
            </div>

            <div class="absolute-center text-h6 text-bold">
              افزودن اطلاعات اولیه
            </div>
          </div>

          <div class="q-mt-md q-mb-sm">
            <div class="row justify-between items-center q-my-md">
              <div class="col-6 q-px-sm">
                <div class="text-grey-7">
                  <span>نام</span>
                </div>

                <div class="q-pt-sm full-width">
                  <q-input outlined v-model="name" />
                </div>
              </div>

              <div class="col-6 q-px-sm flex justify-end">
                <div class="text-grey-7">
                  <span>First Name</span>
                </div>

                <div class="q-pt-sm full-width">
                  <q-input outlined v-model="en.name" />
                </div>
              </div>
            </div>

            <div class="row justify-between items-center q-my-md">
              <div class="col-6 q-px-sm">
                <div class="text-grey-7">
                  <span>نام خانوادگی</span>
                </div>

                <div class="q-pt-sm full-width">
                  <q-input outlined v-model="lname" />
                </div>
              </div>

              <div class="col-6 q-px-sm flex justify-end">
                <div class="text-grey-7">
                  <span>Last Name</span>
                </div>

                <div class="q-pt-sm full-width">
                  <q-input outlined v-model="en.lname" />
                </div>
              </div>
            </div>

            <div class="row justify-between items-center q-my-md">
              <div class="col-6 q-px-sm">
                <div class="text-grey-7 q-pb-sm">
                  <span>جنسیت</span>
                </div>

                <div class="q-pt-sm full-width gender-section">
                  <q-tabs
                    indicator-color="transparent"
                    v-model="gender"
                    no-caps
                    active-class="active-tab"
                  >
                    <q-tab name="male" label="مرد" />
                    <q-tab name="female" label="زن" />
                  </q-tabs>
                </div>
              </div>

              <div class="col-6 q-px-sm flex justify-end">
                <div class="text-grey-7 q-pb-sm">
                  <span>Gender</span>
                </div>

                <div class="q-pt-sm full-width gender-section">
                  <q-tabs
                    indicator-color="transparent"
                    v-model="gender"
                    no-caps
                    active-class="active-tab"
                  >
                    <q-tab name="male" label="Male" />
                    <q-tab name="female" label="Female" />
                  </q-tabs>
                </div>
              </div>
            </div>

            <div class="row justify-between items-center q-my-md">
              <div class="col-6 q-px-sm">
                <div class="text-grey-7 q-pb-sm">
                  <span>وضعیت تاهل </span>
                </div>

                <div class="q-pt-sm full-width gender-section">
                  <q-tabs
                    indicator-color="transparent"
                    v-model="maritalStatus"
                    no-caps
                    active-class="active-tab"
                  >
                    <q-tab name="single" label="مجرد" />
                    <q-tab name="married" label="متاهل" />
                  </q-tabs>
                </div>
              </div>

              <div class="col-6 q-px-sm flex justify-end">
                <div class="text-grey-7 q-pb-sm">
                  <span>Marital Status</span>
                </div>

                <div class="q-pt-sm full-width gender-section">
                  <q-tabs
                    indicator-color="transparent"
                    v-model="maritalStatus"
                    no-caps
                    active-class="active-tab"
                  >
                    <q-tab name="single" label="Single" />
                    <q-tab name="married" label="Married" />
                  </q-tabs>
                </div>
              </div>
            </div>

            <div class="row justify-between items-center q-my-md">
              <div class="col-6 q-px-sm">
                <div class="text-grey-7">
                  <span>وضعیت نظام وظیفه</span>
                </div>

                <div class="q-pt-sm full-width">
                  <q-btn-dropdown
                    no-caps
                    class="full-width"
                    style="height: 55px"
                    outline
                    color="grey-7"
                    align="left"
                  >
                    <template v-slot:label>
                      <div class="full-width text-left">
                        <div>{{ militaryService }}</div>
                      </div>
                    </template>

                    <div>
                      <q-list>
                        <q-item
                          clickable
                          v-close-popup
                          @click="militaryService = 'انجام شده'"
                        >
                          <q-item-section>
                            <q-item-label>انجام شده</q-item-label>
                          </q-item-section>
                        </q-item>

                        <q-item
                          clickable
                          v-close-popup
                          @click="militaryService = 'معاف دائم'"
                        >
                          <q-item-section>
                            <q-item-label>معاف دائم</q-item-label>
                          </q-item-section>
                        </q-item>

                        <q-item
                          clickable
                          v-close-popup
                          @click="militaryService = 'معافیت تحصیلی'"
                        >
                          <q-item-section>
                            <q-item-label>معافیت تحصیلی</q-item-label>
                          </q-item-section>
                        </q-item>

                        <q-item
                          clickable
                          v-close-popup
                          @click="militaryService = 'در حال انجام'"
                        >
                          <q-item-section>
                            <q-item-label>در حال انجام</q-item-label>
                          </q-item-section>
                        </q-item>

                        <q-item
                          clickable
                          v-close-popup
                          @click="militaryService = 'مشمول'"
                        >
                          <q-item-section>
                            <q-item-label>مشمول</q-item-label>
                          </q-item-section>
                        </q-item>
                      </q-list>
                    </div>
                  </q-btn-dropdown>
                </div>
              </div>

              <div class="col-6 q-px-sm flex justify-end">
                <div class="text-grey-7">
                  <span>Military Service Status</span>
                </div>

                <div class="q-pt-sm full-width">
                  <q-btn-dropdown
                    no-caps
                    class="full-width"
                    style="height: 55px; direction: ltr"
                    outline
                    color="grey-7"
                    align="left"
                  >
                    <template v-slot:label>
                      <div class="full-width text-right">
                        <div>{{ en.militaryService }}</div>
                      </div>
                    </template>

                    <div>
                      <q-list>
                        <q-item
                          clickable
                          v-close-popup
                          @click="en.militaryService = 'Completed'"
                        >
                          <q-item-section>
                            <q-item-label>Completed</q-item-label>
                          </q-item-section>
                        </q-item>

                        <q-item
                          clickable
                          v-close-popup
                          @click="en.militaryService = 'Exempted'"
                        >
                          <q-item-section>
                            <q-item-label>Exempted</q-item-label>
                          </q-item-section>
                        </q-item>

                        <q-item
                          clickable
                          v-close-popup
                          @click="en.militaryService = 'Educational Exemption'"
                        >
                          <q-item-section>
                            <q-item-label>Educational Exemption</q-item-label>
                          </q-item-section>
                        </q-item>

                        <q-item
                          clickable
                          v-close-popup
                          @click="en.militaryService = 'Ongoing'"
                        >
                          <q-item-section>
                            <q-item-label>Ongoing</q-item-label>
                          </q-item-section>
                        </q-item>

                        <q-item
                          clickable
                          v-close-popup
                          @click="en.militaryService = 'Not served yet'"
                        >
                          <q-item-section>
                            <q-item-label>Not served yet</q-item-label>
                          </q-item-section>
                        </q-item>
                      </q-list>
                    </div>
                  </q-btn-dropdown>
                </div>
              </div>
            </div>

            <div class="row justify-between items-center q-my-md">
              <div class="col-6 q-px-sm">
                <div class="text-grey-7">
                  <span>شهر محل سکونت</span>
                </div>

                <div class="q-pt-sm full-width">
                  <q-select
                    v-model="city"
                    :options="cityOptions"
                    color="primary"
                    outlined
                    clearable
                    use-input
                    @filter="filterFn"
                  />
                </div>
              </div>

              <div class="col-6 q-px-sm flex justify-end q-pt-sm">
                <div class="text-grey-7">
                  <span>City</span>
                </div>

                <div class="q-pt-sm full-width" style="direction: ltr">
                  <q-select
                    v-model="city"
                    :options="cityOptions"
                    color="primary"
                    outlined
                    clearable
                    use-input
                    @filter="filterFn"
                  />
                </div>
              </div>
            </div>

            <div class="row justify-between items-center q-my-md">
              <div class="col-6 q-px-sm">
                <div class="text-grey-7">
                  <span>محله</span>

                  <q-btn flat color="primary" dense icon="info">
                    <q-tooltip
                      anchor="center left"
                      self="center right"
                      class="bg-blue-9 br-8"
                      style="width: 175px; font-size: 13px"
                    >
                      در صورتی که کارفرما بخواهد با شما تماس بگیرد و موبایل شما
                      در دسترس نباشد این شماره تلفن ثابت به شما کمک می کند که
                      تماس کارفرما را از دست ندهید
                    </q-tooltip>
                  </q-btn>
                </div>

                <div class="q-pt-sm full-width">
                  <q-input outlined v-model="region" />
                </div>
              </div>

              <div class="col-6 q-px-sm flex justify-end q-pt-sm">
                <div class="text-grey-7">
                  <span>Region</span>
                </div>

                <div class="q-pt-sm full-width">
                  <q-input outlined v-model="en.region" />
                </div>
              </div>
            </div>

            <div class="row justify-between items-center q-my-md">
              <div class="col-6 q-px-sm">
                <div @click="showBirth = true" class="text-grey-7">
                  <span>تاریخ تولد</span>

                  <q-btn flat color="primary" dense icon="info">
                    <q-tooltip
                      anchor="center left"
                      self="center right"
                      class="bg-blue-9 br-8"
                      style="width: 175px; font-size: 13px"
                    >
                      در صورتی که کارفرما بخواهد با شما تماس بگیرد و موبایل شما
                      در دسترس نباشد این شماره تلفن ثابت به شما کمک می کند که
                      تماس کارفرما را از دست ندهید
                    </q-tooltip>
                  </q-btn>
                </div>

                <div v-if="showBirth" class="q-pt-sm full-width">
                  <q-date v-model="birth" mask="YYYY-MM-DD" color="purple" />
                </div>
              </div>

              <div class="col-6 q-px-sm flex justify-end q-pt-sm">
                <div class="text-grey-7">
                  <span>Birth Date</span>
                </div>

                <div class="q-pt-sm full-width">
                  <q-input outlined v-model="en.birth" />
                </div>
              </div>
            </div>
          </div>
        </div>

        <div
          class="full-width bg-white q-pa-md text-right"
          style="position: sticky; bottom: 0"
        >
          <div class="q-mt-md">
            <q-btn flat color="grey-7" label="انصراف" />

            <q-btn color="primary" label="ذخیره تغییرات" />
          </div>
        </div>
      </div>
    </q-dialog>
  </q-page>
</template>

<script>
import { useQuasar } from "quasar";
import { onMounted, ref } from "vue";

export default {
  setup() {
    const $q = useQuasar();
    const link = ref("jobvision.ir/cv/83836552-092743");
    const title = ref("دولوپر فول استک در شرکت آیترونیک");
    const linkedin = ref();
    const gender = ref("male");
    const maritalStatus = ref("single");
    const militaryService = ref();
    const city = ref();
    const cityOptions = ref([
      "Google",
      "Facebook",
      "Twitter",
      "Apple",
      "Oracle",
    ]);
    const region = ref();
    const birth = ref("2019-02-22");

    const en = ref({
      title: "Full Stack Develeoper at Aytronic",
      militaryService: "",
      cityOptions: ["Google", "Facebook", "Twitter", "Apple", "Oracle"],
    });

    const share = ref(false);
    const editAbout = ref(false);
    const information = ref(false);
    const editPicture = ref(false);
    const showBirth = ref(false);

    function copyLink() {
      navigator.clipboard.writeText(link.value);

      $q.notify({
        group: false,
        avatar: "https://jobvision.ir/assets/images/toasts/success.svg",
        position: "top-left",
        message: "لینک کپی شد",
        color: "dark",
        actions: [{ icon: "close", color: "white" }],
      });
    }

    function getDate() {
      var time = new Date();
      var dd = String(time.getDate()).padStart(2, "0");
      var mm = String(time.getMonth() + 1).padStart(2, "0"); //January is 0!
      var yyyy = time.getFullYear();

      time = mm + "/" + dd + "/" + yyyy;
      birth.value = time;
    }

    onMounted(() => {
      getDate();
    });

    return {
      en,
      link,
      city,
      title,
      share,
      birth,
      gender,
      region,
      getDate,
      linkedin,
      copyLink,
      showBirth,
      editAbout,
      cityOptions,
      information,
      editPicture,
      maritalStatus,
      militaryService,
      filterFn(val, update) {
        update(() => {
          const needle = val.toLowerCase();
          cityOptions.value = cityOptions.value.filter(
            (v) => v.toLowerCase().indexOf(needle) > -1
          );
        });
      },
    };
  },
};
</script>

<style scoped>
:deep(.input-box .q-field__control),
:deep(.input-box .q-field__marginal) {
  height: 45px !important;
}

.q-dialog__inner--minimized > div {
  max-width: none !important;
}

.active-tab {
  border-bottom: 3px solid;
  border-color: #5660f2 !important;
  border-bottom-right-radius: 0px !important;
  border-bottom-left-radius: 0px !important;
}

.gender-section {
  border: 1px solid #eef0f4;
  border-radius: 4px;
  padding: 0rem 0.7rem;
}
</style>
