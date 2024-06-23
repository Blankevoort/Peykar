<template>
  <q-page class="row justify-center" style="background-color: #f8f9fa">
    <div class="col-xs-12 col-sm-11 col-md-11 col-lg-8 col-xl-7">
      <!-- Preferred Resume & Resume Complition Rate -->

      <div>
        <!-- Resume Complition Rate -->

        <div
          class="lt-md bg-white q-pa-md"
          style="box-shadow: 0 0.125rem 0.25rem #00000013 !important"
        >
          <div class="text-positive text-center text-bold">100% تکمیل شده</div>

          <div class="text-center q-pt-sm">
            <span class="text-subtitle2 text-grey-7">آخرین بروزرسانی</span>

            <span class="text-bold text-grey-8">10 خرداد 1403</span>
          </div>
        </div>

        <!-- Preferred Resume Selection -->

        <div :class="preferredResumeClasses">
          <!-- Preferred Resume Design Options -->

          <div
            class="col-xs-4 col-sm-4 col-md-4 col-lg-6 col-xl-6 row items-center text-grey-7"
          >
            <q-icon class="q-pr-xs" name="visibility" size="20px" />

            <div class="q-px-xs gt-sm">نحوه نمایش رزومه به:</div>

            <q-select
              dense
              borderless
              v-model="preferred"
              :options="preferredOptions"
            />
          </div>

          <!-- Share And Download Resume -->

          <div class="col-xs-8 col-sm-8 col-md-8 col-lg-6 col-xl-6 text-right">
            <q-btn
              flat
              dense
              icon="cloud_download"
              color="grey-7"
              label="دانلود رزومه"
              :class="dynamicBtnPadding"
            />

            <q-btn
              flat
              dense
              icon="share"
              color="grey-7"
              label="اشتراک گذاری رزومه "
              class="gt-sm"
            />

            <q-btn flat dense icon="share" color="grey-7" class="lt-md" />
          </div>
        </div>
      </div>

      <!-- Resume Details -->
      <div class="q-mt-lg">
        <div class="row justify-between">
          <!-- Right Side -->

          <div
            class="col-xs-12 col-sm-12 col-md-8 col-lg-8 col-xl-8 q-gutter-lg"
          >
            <!-- About -->

            <div class="q-px-lg bg-white br-10">
              <BadgeAndTitle
                :progressValue="progressValue"
                title="درباره من"
                :showButton="true"
              >
                <!-- About Content -->

                <div class="q-py-md">
                  <div :class="aboutFirstSection">
                    <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 col-xl-8">
                      <div class="row items-center q-gutter-x-md">
                        <!-- Profile Picutre -->

                        <div class="relative-position q-py-xs">
                          <img
                            src="https://fileapi.jobvision.ir/StaticFiles/Candidate/DefaultImages/default-user-Male.png?v=20231122"
                            style="
                              border-radius: 50%;
                              width: 64px;
                              height: 64px;
                            "
                          />

                          <div class="absolute-bottom text-center">
                            <q-icon
                              name="border_color"
                              class="q-pa-xs"
                              style="
                                border-radius: 4px;
                                background-color: #dde1e6 !important;
                              "
                            />
                          </div>
                        </div>

                        <!-- Name and Job Title -->

                        <div class="q-gutter-y-sm">
                          <div class="text-bold" :style="aboutNameFontSize">
                            معین صداقتی
                          </div>

                          <div
                            class="text-grey-7 q-gutter-x-sm row items-center"
                          >
                            <div>دولوپر فول استک در شرکت آیترونیک</div>

                            <q-icon name="edit" size="18px" />
                          </div>
                        </div>
                      </div>
                    </div>

                    <!-- Add About Content? -->

                    <div :class="addAboutContent">
                      <div class="row q-gutter-x-sm">
                        <div
                          class="text-primary q-px-md q-py-sm"
                          style="border: 2px dashed #5660f2"
                        >
                          + افزودن
                        </div>

                        <img
                          src="https://jobvision.ir/assets/images/linkedin.svg"
                        />
                      </div>
                    </div>
                  </div>

                  <!-- User Description - Persian -->

                  <div class="text-grey-7 q-py-sm">
                    معین صداقتی متولد سال 1386/9/9. از 13 سالگی شروع به یاد گیری
                    برنامه نویسی کردم و از 15 سالگی به صورت جدی برنامه نویسی
                    میکنم. درحال تحصیل در رشته کامپیوتر.
                  </div>
                </div>
              </BadgeAndTitle>
            </div>

            <!-- Basic Information -->

            <div class="q-px-lg bg-white br-10">
              <BadgeAndTitle
                :progressValue="progressValue"
                title="اطلاعات اولیه"
                :showButton="true"
              >
                <!-- Information Content -->

                <div class="q-py-xs">
                  <div
                    v-for="item in basicInformation"
                    :key="item"
                    class="q-py-sm"
                  >
                    <infoDisplay :title="item.title" :info="item.info" />
                  </div>
                </div>
              </BadgeAndTitle>
            </div>

            <!-- Educational Records -->

            <div class="q-px-lg bg-white br-10">
              <useCard
                :progressValue="progressValue"
                title="سوابق تحصیلی"
                :showButton="false"
                :disableEditButton="true"
                :hasModel="hasEducation"
                noModel="تحصیلات دانشگاهی ندارم"
                :educationSection="true"
                :checkboxModel="noUniversityEducation"
              >
                <div class="q-gutter-y-sm">
                  <div class="text-bold">سطح: رشته</div>
                  <div class="text-grey-7">نام دانشگاه</div>
                  <div class="text-grey-7">سال تحصیل - سال پایان</div>
                  <div class="text-grey-7">معدل: معدل</div>
                </div>
              </useCard>
            </div>
          </div>

          <!-- Left Side & Mobile Bottom Content -->

          <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
            <!-- Resume Complition Rate Card -->

            <div class="q-py-md q-px-lg br-10 bg-white custom-shadow gt-sm">
              <!-- Card Title -->

              <div class="row items-center q-gutter-xs">
                <div class="text-bold">میزان تکمیل رزومه</div>

                <div style="font-size: 12px">
                  <span class="text-grey-7">آخرین به روزرسانی:</span>
                  <span class="text-grey-8 text-bold">10 خرداد 1403</span>
                </div>
              </div>

              <!-- Card Progress -->

              <div class="row justify-between items-center q-pa-md">
                <div class="col row items-center">
                  <q-circular-progress
                    show-value
                    font-size="12px"
                    :value="value"
                    size="75px"
                    :thickness="0.11"
                    :color="progressColor"
                    track-color="grey-3"
                    :class="progressClass"
                  >
                    {{ value }}%
                  </q-circular-progress>

                  <div class="q-pl-lg">
                    <div>رزومه فارسی</div>
                    <div class="text-positive q-py-sm">تکمیل شده</div>
                  </div>
                </div>

                <div class="flex items-center text-right">
                  <q-icon
                    class="col"
                    name="cloud_download"
                    color="primary"
                    size="26px"
                  />
                </div>
              </div>

              <!-- Card Links -->

              <div>
                <div class="text-bold">افزودن بخش های تکمیلی</div>

                <div class="row q-py-sm">
                  <q-btn
                    dense
                    class="q-px-sm"
                    flat
                    color="primary"
                    label="کتاب‌ها و مقالات"
                  />

                  <q-separator vertical />

                  <q-btn
                    dense
                    class="q-px-sm"
                    flat
                    color="primary"
                    label="پروژه‌ها و تجربیات آکادمیک"
                  />

                  <q-separator vertical />

                  <q-btn
                    dense
                    class="q-px-sm"
                    flat
                    color="primary"
                    label="+ 3 مورد دیگر"
                  />
                </div>
              </div>
            </div>

            <!-- Contact Ways, Voice and Personal Resume -->

            <div class="q-py-md br-10 bg-white q-my-lg custom-shadow">
              <!-- Contact Ways -->

              <div class="q-px-lg">
                <div :class="titleClass">اطلاعات تماس</div>

                <div class="q-gutter-y-sm q-pt-md q-pb-lg">
                  <!-- Email -->

                  <div>
                    <div class="text-grey-7 row">
                      <div>آدرس ایمیل</div>

                      <q-space />

                      <img
                        src="https://jobvision.ir/assets/images/cv-maker/edit-secondary.svg"
                        style="width: 16px"
                      />
                    </div>

                    <div class="text-bold q-pt-sm">
                      moeensedaghaty86@gmail.com
                    </div>
                  </div>

                  <!-- Phone -->

                  <div>
                    <div class="text-grey-7 row">
                      <div>شماره موبایل</div>

                      <q-space />

                      <img
                        src="https://jobvision.ir/assets/images/cv-maker/edit-secondary.svg"
                        style="width: 16px"
                      />
                    </div>

                    <div class="text-bold q-pt-sm">09379608155</div>
                  </div>
                </div>
              </div>

              <q-separator color="grey-3" />

              <!-- Voice -->

              <div class="q-px-lg">
                <BadgeAndTitle
                  :progressValue="progressValue"
                  title="معرفی صوتی"
                  :showButton="false"
                >
                  <!-- Voice Description and Benefits -->

                  <div class="q-py-md">
                    <div class="text-grey-7">
                      در این بخش، خود را در قالب یک صوت حداکثر دو دقیقه ای به
                      کارفرما معرفی کنید. در بسیاری از موارد شناختی که این معرفی
                      دو دقیقه ای برای کارفرمایان ایجاد میکند
                      <span class="text-bold text-grey-8"
                        >از رزومه شما بیشتر است.
                      </span>
                    </div>
                  </div>

                  <!-- Add or Record Voice -->

                  <div class="row justify-center items-center q-gutter-md">
                    <div class="bg-primary q-pa-sm text-center record-button">
                      <img
                        src="https://jobvision.ir/assets/images/my-cv/microphone.svg"
                        style="width: 13px"
                      />
                    </div>

                    <div class="text-primary text-h6">ضبط صدا</div>
                  </div>
                </BadgeAndTitle>
              </div>

              <q-separator color="grey-3" />

              <!-- Personal Resume -->

              <div class="q-px-lg">
                <BadgeAndTitle
                  :progressValue="progressValue"
                  title="بارگذاری رزومه شخصی"
                  :showButton="false"
                >
                  <!-- Voice Description and Benefits -->

                  <div class="q-py-md">
                    <div class="text-grey-7">
                      در این بخش با بارگذاری فایل رزومه خود نیز می‌توانید به جذب
                      بهتر خود کمک کنید.
                    </div>
                  </div>

                  <!-- Image -->

                  <div class="text-center">
                    <q-img
                      src="https://jobvision.ir/assets/images/my-cv/cv-sample.svg"
                      style="width: 191px; height: 181px"
                    />
                  </div>
                </BadgeAndTitle>
              </div>
            </div>

            <!-- Portfolio -->

            <div class="br-10 bg-white q-my-lg custom-shadow">
              <div class="q-px-lg">
                <BadgeAndTitle
                  :progressValue="progressValue"
                  title="نمونه کارها"
                  :showButton="false"
                >
                  <!-- Portfolio Content -->

                  <div class="q-pt-md q-pb-sm">
                    <div class="row">
                      <!-- Acion Buttons -->

                      <div class="col-3 text-grey-8">
                        <q-icon name="delete" size="24px" />
                        <q-icon class="q-pl-sm" name="edit" size="24px" />
                      </div>

                      <!-- Urls -->

                      <div class="col-9">
                        <div
                          class="row justify-end items-center q-gutter-x-md full-width"
                        >
                          <!-- Url -->

                          <a
                            target="_blank"
                            class="text-primary"
                            href="
                            https://moeensedaqati.ir/#/"
                            style="
                              cursor: pointer;
                              direction: ltr;
                              text-decoration: none;
                            "
                          >
                            https://moeensedaqati.ir/#/
                          </a>

                          <!-- Icon -->

                          <img
                            src="https://jobvision.ir/assets/images/my-cv/link-icon-primary.svg"
                          />
                        </div>
                      </div>
                    </div>
                  </div>
                </BadgeAndTitle>
              </div>
            </div>

            <!-- Calculator -->

            <div
              class="br-10 q-my-lg custom-shadow"
              style="background-color: #eeeffe !important"
            >
              <div class="q-px-xl q-py-lg text-center">
                <img
                  src="https://jobvision.ir/assets/images/my-cv/salary-table.svg"
                />

                <div class="q-pt-md text-bold" style="font-size: 12px">
                  از حقوق دریافتی افراد در مشاغل مختلف باخبر شوید
                </div>

                <div class="q-pb-md q-pt-sm" style="font-size: 11px">
                  حقوق و دستمزد مشاغل مختلف را بررسی کنید و تخمین دقیق‌تری از
                  حقوق منصفانه خود داشته باشید.
                </div>

                <q-btn
                  flat
                  to="salary"
                  color="primary"
                  class="text-bold"
                  style="font-size: 12px"
                  icon-right="keyboard_backspace"
                  label="ماشین حساب حقوق و دستمزد"
                />
              </div>
            </div>

            <!-- Test Results -->

            <div class="br-10 bg-white q-my-lg custom-shadow">
              <div class="q-px-lg q-py-md">
                <!-- Test Results Title -->

                <div :class="titleClass">نتایج تست‌ها</div>

                <!-- Test Results Content -->

                <div class="q-pt-md q-gutter-y-sm" style="">
                  <!-- Bar-On -->

                  <div class="row items-center">
                    <div class="col-8 row items-center q-gutter-sm">
                      <img
                        src="https://jobvision.ir/assets/images/tick-secondary.svg"
                      />
                      <div class="text-grey-6">Bar-On هوش هیجانی</div>
                    </div>

                    <div class="col-4 text-right">
                      <q-btn dense flat color="primary" label="شرکت در تست" />
                    </div>
                  </div>

                  <!-- MBTI -->

                  <div class="row items-center">
                    <div class="col-8 row items-center q-gutter-sm">
                      <img
                        src="https://jobvision.ir/assets/images/tick-primary.svg"
                      />
                      <div class="text-bold">MBTI شخصیت شناسی</div>
                    </div>

                    <div class="col-4 text-right">
                      <q-btn dense flat color="primary" label="مشاهده نتیجه" />
                    </div>
                  </div>

                  <!-- NEO -->

                  <div class="row items-center">
                    <div class="col-8 row items-center q-gutter-sm">
                      <img
                        src="https://jobvision.ir/assets/images/tick-secondary.svg"
                      />
                      <div class="text-grey-6">NEO شخصیت شناسی</div>
                    </div>

                    <div class="col-4 text-right">
                      <q-btn dense flat color="primary" label="شرکت در تست" />
                    </div>
                  </div>

                  <!-- Multiple Intelligences -->

                  <div class="row items-center">
                    <div class="col-8 row items-center q-gutter-sm">
                      <img
                        src="https://jobvision.ir/assets/images/tick-secondary.svg"
                      />
                      <div class="text-grey-6">هوش های چندگانه</div>
                    </div>

                    <div class="col-4 text-right">
                      <q-btn dense flat color="primary" label="شرکت در تست" />
                    </div>
                  </div>

                  <!-- Holland -->

                  <div class="row items-center">
                    <div class="col-8 row items-center q-gutter-sm">
                      <img
                        src="https://jobvision.ir/assets/images/tick-secondary.svg"
                      />
                      <div class="text-grey-6">Holland تیپ سنجی شغلی</div>
                    </div>

                    <div class="col-4 text-right">
                      <q-btn dense flat color="primary" label="شرکت در تست" />
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </q-page>
</template>

<script>
import { ref, defineComponent } from "vue";

import UseCard from "../../../components/ResumeCard.vue";
import BadgeAndTitle from "../../../components/ResumeBadgeAndTitle.vue";
import infoDisplay from "../../../components/BasicInformationContent.vue";

export default defineComponent({
  components: {
    UseCard,
    infoDisplay,
    BadgeAndTitle,
  },

  computed: {
    preferredResumeClasses() {
      return {
        "bg-white": this.$q.screen.gt.sm,
        "q-pa-md": true,
        "full-width": true,
        row: true,
        "justify-between": true,
        "items-center": true,
        "brb-10": true,
      };
    },
    dynamicBtnPadding() {
      return this.$q.screen.xs ? "q-px-md" : "q-px-lg";
    },
    progressColor() {
      if (this.value < 50) {
        return "negative";
      } else if (this.value >= 50 && this.value <= 80) {
        return "blue-grey-8";
      } else {
        return "positive";
      }
    },
    progressClass() {
      if (this.value < 50) {
        return "text-negative text-bold";
      } else if (this.value >= 50 && this.value <= 80) {
        return "text-blue-grey-8 text-bold";
      } else {
        return "text-positive text-bold";
      }
    },
    addAboutContent() {
      if (this.$q.screen.lt.md) {
        return "col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 flex justify-center";
      } else {
        return "col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 flex justify-end";
      }
    },
    aboutFirstSection() {
      return this.$q.screen.lt.md
        ? "row items-between items-center q-pb-md"
        : "row items-between items-center";
    },
    aboutNameFontSize() {
      return {
        fontSize: this.$q.screen.lt.md ? "12px" : "16px",
      };
    },
    titleClass() {
      return this.$q.screen.gt.sm ? "text-h6 text-bold" : "text-bold";
    },
  },

  setup() {
    const editEmail = ref(false);
    const editPhone = ref(false);
    const preferred = ref("خودم");
    const basicInformation = [
      { title: "نام و نام خانوادگی", info: "معین صداقتی" },
      { title: "جنسیت", info: "مرد" },
      { title: "وضعیت تاهل", info: "مجرد" },
      { title: "وضعیت نظام وظیفه", info: "معافیت تحصیلی" },
      { title: "شهر محل سکونت", info: "گنبد کاووس" },
      {
        title: "محل سکونت",
        info: "خیابان بخت غربی نرسیده به چهارراه فردوسی جنب یخچال سازی صوفی زاده و باطری سازی",
      },
      { title: "تاریخ تولد", info: "۱۳۸۸/۰۹/۰۹" },
      { title: "شماره ثابت", info: "۳۳۳۳۱۴۸۴" },
      { title: "حقوق درخواستی", info: "۸ - ۱۰ میلیون تومان" },
      { title: "نوع شغل مورد علاقه", info: "توسعه نرم افزار و برنامه نویسی" },
    ];

    // Educational Records

    const hasEducation = ref(true);
    const noUniversityEducation = ref(false);

    return {
      editEmail,
      editPhone,
      preferred,
      value: 100,
      hasEducation,
      basicInformation,
      progressValue: 0,
      noUniversityEducation,
      preferredOptions: ["خودم", "کارفرما"],
    };
  },
});
</script>

<style scoped>
.brb-10 {
  border-bottom-left-radius: 10px;
  border-bottom-right-radius: 10px;
}

.br-10 {
  border-radius: 10px;
}

.br-0 {
  border-radius: 0;
}

.custom-shadow {
  box-shadow: 0 1px 30px #00000008, 0 1px 2px #0000000d !important;
}

.record-button {
  border-radius: 50%;
  width: 40px;
  height: 40px;
}
.active-tabs {
  background-color: #5660f2 !important;
  color: white !important;
}

.active-tab {
  border-left: 3px solid;
  border-color: #5660f2 !important;
  border-top-left-radius: 0px !important;
  border-bottom-left-radius: 0px !important;
  font-weight: bold !important;
}

.active-sort-type {
  background-color: #5660f2 !important;
  color: white !important;
}

.custom-border {
  border-radius: 10px !important;
  border: 2px solid #dde1e6;
}

.active-category {
  background: #4a4e57 !important;
  color: white !important;
}

.not-active-category {
  cursor: pointer;
  border-radius: 40px;
  background-color: #fff;
  border: 1px solid #e0e0e0;
  margin: 0 4px;
  padding: 8px 16px;
}
</style>
