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
                label="شرکت های برتر"
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
              <q-item clickable v-ripple>
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
      </div>
    </q-footer>
  </q-layout>
</template>

<script>
import { ref } from "vue";

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
