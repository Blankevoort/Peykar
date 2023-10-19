<template>
  <q-layout view="hHh lpR fFf">
    <q-header class="row justify-center shadow" style="height: 70px">
      <q-toolbar class="col-8">
        <q-toolbar-title class="col-6 flex justify-right">
          <img
            src="https://jobvision.ir/assets/images/header/header-logo-primary-desktop.svg"
          />

          <q-separator class="q-mx-md" vertical />

          <q-btn-dropdown
            color="primary"
            label="نام کاربری"
            dropdown-icon="expand_more"
            padding="8px 20px"
          >
            <q-list>
              <q-item clickable v-ripple :active="active">
                <q-item-section side></q-item-section>
                <div class="q-mx-lg"></div>
                <q-item-section>رزومه من</q-item-section>
                <q-item-section avatar>
                  <q-icon name="description" />
                </q-item-section>
              </q-item>

              <q-item clickable v-ripple :active="active">
                <q-item-section side></q-item-section>
                <div class="q-mx-lg"></div>
                <q-item-section>رزومه های ارسال شده</q-item-section>
                <q-item-section avatar>
                  <q-icon name="drive_folder_upload" />
                </q-item-section>
              </q-item>

              <q-item clickable v-ripple :active="active">
                <q-item-section side>48 مورد</q-item-section>
                <div class="q-mx-lg"></div>
                <q-item-section>مشاغل پیشنهادی</q-item-section>
                <q-item-section avatar>
                  <q-icon name="hotel_class" />
                </q-item-section>
              </q-item>

              <q-item clickable v-ripple :active="active">
                <q-item-section side>0 مورد</q-item-section>
                <div class="q-mx-lg"></div>
                <q-item-section>مشاغل نشان شده</q-item-section>
                <q-item-section avatar>
                  <q-icon name="favorite_outline" />
                </q-item-section>
              </q-item>

              <q-item clickable v-ripple :active="active">
                <q-item-section side>0 مورد</q-item-section>
                <div class="q-mx-lg"></div>
                <q-item-section>جستجو های ذخیره شده</q-item-section>
                <q-item-section avatar>
                  <q-icon name="saved_search" />
                </q-item-section>
              </q-item>

              <q-item clickable v-ripple :active="active">
                <q-item-section side>0 مورد</q-item-section>
                <div class="q-mx-lg"></div>
                <q-item-section>شرکت های دنبال شده</q-item-section>
                <q-item-section avatar>
                  <q-icon name="apartment" />
                </q-item-section>
              </q-item>

              <q-item clickable v-ripple :active="active">
                <q-item-section side></q-item-section>
                <div class="q-mx-lg"></div>
                <q-item-section>دوره های آموزشی پیشنهادی</q-item-section>
                <q-item-section avatar>
                  <q-icon name="school" />
                </q-item-section>
              </q-item>

              <q-item clickable v-ripple :active="active">
                <q-item-section side></q-item-section>
                <div class="q-mx-lg"></div>
                <q-item-section>نمایشگاه کار</q-item-section>
                <q-item-section avatar>
                  <q-icon name="business_center" />
                </q-item-section>
              </q-item>

              <q-item clickable v-ripple :active="active">
                <q-item-section side></q-item-section>
                <div class="q-mx-lg"></div>
                <q-item-section>تنظیمات ناحیه کاربری</q-item-section>
                <q-item-section avatar>
                  <q-icon name="settings" />
                </q-item-section>
              </q-item>

              <q-item clickable v-ripple :active="active">
                <q-item-section side>0 مورد</q-item-section>
                <div class="q-mx-lg"></div>
                <q-item-section>پیام های من</q-item-section>
                <q-item-section avatar>
                  <q-icon name="notifications " />
                </q-item-section>
              </q-item>
            </q-list>
          </q-btn-dropdown>
        </q-toolbar-title>

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
      </q-toolbar>
    </q-header>

    <q-page-container>
      <router-view />
    </q-page-container>

    <q-footer class="bg-dark text-white"></q-footer>
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
</style>
