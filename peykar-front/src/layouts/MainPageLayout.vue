<template>
  <q-layout view="hHh lpR fFf">
    <q-header class="row justify-center shadow" style="height: 70px">
      <q-toolbar class="col-8">
        <div class="col-6">
          <div>
            <div>
              <q-btn
                flat
                label="فرصت های شغلی"
                to="/jobs"
                class="btn--no-hover"
              />
              <q-btn
                flat
                label="فرصت های شغلی پیشنهادی"
                to="/recommended-jobs"
                class="btn--no-hover"
              />
              <q-btn
                flat
                label="رزومه من"
                to="/my-cv"
                class="btn--no-hover button-effect"
              />
              <q-btn
                flat
                label="
                داده‌های بازار کار"
                to="/top-companies"
                class="btn--no-hover button-effect"
              />
            </div>
          </div>
        </div>

        <q-toolbar-title class="col-6 row justify-end">
          <q-btn-dropdown
            color="primary"
            label="نام کاربری"
            dropdown-icon="expand_more"
            padding="8px 20px"
          >
            <q-list>
              <q-item to="/my-cv" clickable v-ripple>
                <q-item-section avatar>
                  <q-icon name="description" />
                </q-item-section>
                <q-item-section>رزومه من</q-item-section>
                <div class="q-mx-lg"></div>
                <q-item-section side></q-item-section>
              </q-item>

              <q-item clickable v-ripple>
                <q-item-section avatar>
                  <q-icon name="drive_folder_upload" />
                </q-item-section>
                <q-item-section>رزومه های ارسال شده</q-item-section>
                <div class="q-mx-lg"></div>
              </q-item>

              <q-item clickable v-ripple>
                <q-item-section avatar>
                  <q-icon name="hotel_class" />
                </q-item-section>
                <q-item-section>مشاغل پیشنهادی</q-item-section>
                <div class="q-mx-lg"></div>
                <q-item-section side>48 مورد</q-item-section>
              </q-item>

              <q-item clickable v-ripple>
                <q-item-section avatar>
                  <q-icon name="favorite_outline" />
                </q-item-section>
                <q-item-section>مشاغل نشان شده</q-item-section>
                <div class="q-mx-lg"></div>
                <q-item-section side>0 مورد</q-item-section>
              </q-item>

              <q-item clickable v-ripple>
                <q-item-section avatar>
                  <q-icon name="saved_search" />
                </q-item-section>
                <q-item-section>جستجو های ذخیره شده</q-item-section>
                <div class="q-mx-lg"></div>
                <q-item-section side>0 مورد</q-item-section>
              </q-item>

              <q-item clickable v-ripple>
                <q-item-section avatar>
                  <q-icon name="apartment" />
                </q-item-section>
                <q-item-section>شرکت های دنبال شده</q-item-section>
                <div class="q-mx-lg"></div>
                <q-item-section side>0 مورد</q-item-section>
              </q-item>

              <q-item clickable v-ripple>
                <q-item-section avatar>
                  <q-icon name="school" />
                </q-item-section>
                <q-item-section>دوره های آموزشی پیشنهادی</q-item-section>
                <div class="q-mx-lg"></div>
              </q-item>

              <q-item clickable v-ripple>
                <q-item-section avatar>
                  <q-icon name="business_center" />
                </q-item-section>
                <q-item-section>نمایشگاه کار</q-item-section>
                <div class="q-mx-lg"></div>
              </q-item>

              <q-item clickable v-ripple>
                <q-item-section avatar>
                  <q-icon name="settings" />
                </q-item-section>
                <q-item-section>تنظیمات ناحیه کاربری</q-item-section>
              </q-item>

              <q-item clickable v-ripple>
                <q-item-section avatar>
                  <q-icon name="notifications " />
                </q-item-section>
                <q-item-section>پیام های من</q-item-section>
                <div class="q-mx-lg"></div>
                <q-item-section side>0 مورد</q-item-section>
              </q-item>

              <q-item class="text-red" clickable v-ripple>
                <q-item-section avatar>
                  <q-icon name="logout " />
                </q-item-section>
                <q-item-section>خروج از حساب</q-item-section>
              </q-item>
            </q-list>
          </q-btn-dropdown>

          <q-separator class="q-mx-md" vertical />

          <img
            src="https://jobvision.ir/assets/images/header/header-logo-primary-desktop.svg"
            @click="$router.push('/')"
          />
        </q-toolbar-title>
      </q-toolbar>
    </q-header>

    <q-page-container>
      <router-view />
    </q-page-container>

    <q-footer class="bg-dark text-white row justify-center">
      <div class="col-8 row q-my-md">
        <div class="text-h6 text-weight-bold col-12 q-mt-md">سوالات متداول</div>
        <div class="col-12 q-my-md">
          <q-list bordered class="background border-18 q-my-md">
            <q-expansion-item
              expand-separator
              hide-expand-icon
              icon="question_mark"
              label="سایت استخدامی جاب ویژن، چه مزیتی نسبت به دیگر سایت‌های کاریابی و استخدامی دارد؟"
            >
              <q-card class="background border-18-bottom">
                <q-separator color="white" />

                <q-card-section>
                  وبسایت جاب ویژن با بیش از 40 هزار آگهی استخدام فعال و استفاده
                  از هوش مصنوعی برای پیشنهاد مرتبط‌ترین آگهی‌ها به کارجویان،
                  فرایند کاریابی را بسیار آسان‌تر کرده است.
                </q-card-section>
              </q-card>
            </q-expansion-item>
          </q-list>

          <q-list bordered class="background border-18 q-my-md">
            <q-expansion-item
              expand-separator
              hide-expand-icon
              icon="question_mark"
              label="آیا ساخت و ارسال رزومه در جاب ویژن برای من هزینه‌ای دارد؟"
            >
              <q-card class="background border-18-bottom">
                <q-separator color="white" />

                <q-card-section>
                  خیر، کارجویان می‌توانند بدون پرداخت هیچ هزینه‌ای در سایت
                  کاریابی جاب ویژن رزومه بسازند و برای آگهی‌های استخدام ارسال
                  کنند.
                </q-card-section>
              </q-card>
            </q-expansion-item>
          </q-list>

          <q-list bordered class="background border-18 q-my-md">
            <q-expansion-item
              expand-separator
              hide-expand-icon
              icon="question_mark"
              label="چگونه می‌توانم آگهی‌های استخدام مشاغل مرتبط با خودم را پیدا کنم؟"
            >
              <q-card class="background border-18-bottom">
                <q-separator color="white" />

                <q-card-section>
                  شما می‌توانید به راحتی با استفاده از نوار جستجوی بالای سایت و
                  انتخاب فیلترهای مختلف، آگهی‌های استخدامی حوزه مرتبط با خودتان
                  را پیدا کنید.
                </q-card-section>
              </q-card>
            </q-expansion-item>
          </q-list>

          <q-list bordered class="background border-18 q-my-md">
            <q-expansion-item
              expand-separator
              hide-expand-icon
              icon="question_mark"
              label="چگونه می‌توانم از جدیدترین آگهی‌های استخدام مطلع شوم؟"
            >
              <q-card class="background border-18-bottom">
                <q-separator color="white" />

                <q-card-section>
                  شما می‌توانید با فعالسازی گزینه ایمیل اطلاع رسانی و عضویت در
                  بات تلگرامی جاب ویژن، از جدیدترین آگهی‌های استخدام و کاریابی
                  حوزه شغلی خود مطلع شوید.
                </q-card-section>
              </q-card>
            </q-expansion-item>
          </q-list>

          <q-list bordered class="background border-18 q-my-md">
            <q-expansion-item
              expand-separator
              hide-expand-icon
              icon="question_mark"
              label="آیا آگهی‌های استخدام شهرستان‌ها نیز در سایت جاب ویژن منتشر می‌شوند؟"
            >
              <q-card class="background border-18-bottom">
                <q-separator color="white" />

                <q-card-section>
                  بله؛ تمامی شهرها و شهرستان‌های استان‌های مختلف ایران در سایت
                  جاب ویژن وجود دارند و شما می‌توانید با استفاده از فیلتر «شهر»
                  در نوار جستجوی بالای سایت، هرکدام از آن‌ها را انتخاب کنید.
                </q-card-section>
              </q-card>
            </q-expansion-item>
          </q-list>

          <q-list bordered class="background border-18 q-my-md">
            <q-expansion-item
              expand-separator
              hide-expand-icon
              icon="question_mark"
              label="آیا محدودیتی در ارسال رزومه برای آگهی‌های استخدامی در سایت جاب ویژن وجود دارد؟"
            >
              <q-card class="background border-18-bottom">
                <q-separator color="white" />

                <q-card-section>
                  خیر؛ شما می‌توانید رزومه خودتان را به صورت کاملا رایگان برای
                  تعداد نامحدودی از آگهی‌های استخدام ارسال کنید.
                </q-card-section>
              </q-card>
            </q-expansion-item>
          </q-list>
        </div>

        <div class="col-6 row justify-between">
          <div class="col-5 row full-width">
            <div class="col-6">
              <div class="text-h6 text-weight-bold col-12 q-mt-md">
                کارجویان
              </div>
              <div class="col-12 q-mt-md">
                <q-btn flat label="رزومه ساز دو زبانه" />
              </div>

              <div class="col-12">
                <q-btn flat label="جستجوی فرصت‌های شغلی" />
              </div>

              <q-expansion-item
                class="col-12"
                expand-separator
                label="آزمون‌های خود شناسی"
              >
                <q-btn flat label="آزمون شخصیت شناسی MBTI" />
                <q-btn flat label="آزمون تیپ سنجی شغلی Holland" />
                <q-btn flat label="آزمون شخصیت شناسی NEO" />
                <q-btn flat label="آشنایی با شرکت ها" />
                <q-btn flat label="آزمون هوش های چندگانه" />
                <q-btn flat label="آزمون هوش هیجانی Bar-On" />
              </q-expansion-item>

              <div class="col-12">
                <q-btn flat label="سوالات متداول" />
              </div>

              <div class="col-12">
                <q-btn flat label="دوره‌های آموزشی" />
              </div>

              <div class="col-12">
                <q-btn flat label="رده بندی شرکت ها" />
              </div>

              <div class="col-12">
                <q-btn flat label="آشنایی با شرکت ها" />
              </div>

              <div class="col-12">
                <q-btn flat label="داده‌های بازار کار" />
              </div>
            </div>

            <div class="col-6 row items-center q-px-md">
              <div class="text-h6 text-weight-bold col-12 q-mt-md">
                درباره جاب ویژن
              </div>

              <q-list dense>
                <q-item>
                  <q-btn flat label="درباره ما" />
                </q-item>

                <q-item>
                  <q-btn flat label="سوالات متداول" />
                </q-item>

                <q-item>
                  <q-btn flat label="تماس با ما" />
                </q-item>

                <q-item>
                  <q-btn flat label="قوانین و مقررات" />
                </q-item>
              </q-list>
            </div>
          </div>
        </div>

        <div class="col-6 row justify-end content-center">
          <q-img style="width: 175px; height: 175px" src="../assets/logo.png" />
        </div>
      </div>

      <q-separator class="q-my-md full-width" />

      <div class="col-8 row q-my-md">
        <div class="col-5">
          <div style="line-height: 35px">
            جاب‌ویژن بعنوان اولین ارائه دهنده بسته جامع خدمات کاریابی و استخدام،
            تجربه برگزاری موفق ادوار مختلف نمایشگاه‌های کار شریف و ایران را در
            کارنامه کاری خود دارد. سیستم هوشمند انطباق، رزومه ساز دو زبانه،
            تست‌های خودشناسی، ارتقای توانمندی‌ها به کمک پیشنهاد دوره‌های آموزشی
            و همکاری با معتبرترین سازمان‌ها برای استخدام از ویژگی‌های متمایز
            جاب‌ویژن است.
          </div>
        </div>

        <q-space />

        <div class="col-5">
          <div>
            جاب‌ویژن محصولی دانش بنیان شناخته شده است.
            <br />
            <br />
            دارای مجوز رسمی کاریابی الکترونیکی از وزارت کار، تعاون و رفاه
            اجتماعی
          </div>
        </div>
        <div class="col-12 row justify-between">
          <div class="q-mt-lg q-mb-md col-5">
            <q-img
              src="../assets/header-logo-white.svg"
              style="width: 75px; height: 35px"
            />
          </div>

          <div class="q-mt-lg q-mb-md col-5">
            <q-btn
              class="q-mx-xs"
              size="20px"
              flat
              href="https://twitter.com/JobVision_ir?s=09"
              icon="fa-brands fa-twitter"
            />

            <q-btn
              class="q-mx-xs"
              size="20px"
              flat
              href="https://www.telegram.me/jobvision"
              icon="fa-brands fa-telegram"
            />

            <q-btn
              class="q-mx-xs"
              size="20px"
              flat
              href="https://www.linkedin.com/company/13213221?trk=tyah&trkInfo=clickedVertical%3Acompany%2CclickedEntityId%3A13213221%2Cidx%3A2-4-5%2CtarId%3A1477291719870%2Ctas%3Ajob%20vision"
              icon="fa-brands fa-linkedin"
            />

            <q-btn
              class="q-mx-xs"
              size="20px"
              flat
              href="https://www.instagram.com/job_vision"
              icon="fa-brands fa-instagram"
            />
          </div>
        </div>
      </div>
    </q-footer>
  </q-layout>
</template>

<script>
import { ref } from "vue";
import { useRouter } from "vue-router";

export default {
  setup() {
    return {};
  },
};
</script>

<style scoped>
.fixed,
.fixed-full,
.fullscreen,
.fixed-center,
.fixed-bottom,
.fixed-left,
.fixed-right,
.fixed-top,
.fixed-top-left,
.fixed-top-right,
.fixed-bottom-left,
.fixed-bottom-right {
  position: absolute;
}

.q-layout__section--marginal {
  background-color: white;
  color: black;
}

#q-app
  > div
  > header
  > div
  > div.q-toolbar__title.ellipsis.col-6.flex.justify-right
  > hr {
  border-radius: 8px;
  width: 2px;
}

.q-btn {
  padding: 0px 8px;
}

.q-item__section--main ~ .q-item__section--side {
  padding-right: 12px;
}

.q-item__section--avatar {
  min-width: 35px;
}

.q-item {
  padding: 12px 12px;
}

.shadow {
  box-shadow: 0 1px 30px #00000008, 0 1px 2px #0000000d;
  border-radius: 0 0 10px 10px;
  background-color: #fff;
}

:deep(.q-btn.btn--no-hover .q-focus-helper) {
  display: none;
}

.button-effect:hover {
  border-color: #5660f2 !important;
  border-bottom-style: solid !important;
  border-width: 3px !important;
}

.background {
  background-color: #ffffff1a !important;
}

.border-18 {
  border-radius: 18.5px;
}

.border-18-bottom {
  border-bottom-left-radius: 18.5px;
  border-bottom-right-radius: 18.5px;
}
</style>
