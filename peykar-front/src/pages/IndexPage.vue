<template>
  <q-page class="row justify-center">
    <div class="col-8 row justify-between content-center items-center">
      <div class="col-6 text-weight-bold" style="font-size: 40px">
        <div class="row" style="width: 350px">
          <span class="text-primary">39,271</span> آگهی شغلی در
          <span class="text-primary">454</span> شهر
        </div>
      </div>

      <div class="col-6">
        <div class="row justify-center">
          <img
            style="width: 350px; height: 350px"
            src="../assets/IR-Map.svg"
            alt="iranMap"
          />
        </div>
      </div>

      <div class="text-weight-bold q-my-md" style="font-size: 20px">
        دنبال چه شغلی می‌گردید؟
      </div>

      <div class="col-12 row justify-between content-center">
        <q-select
          class="col-4 q-px-sm"
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
          class="col-3 q-px-sm"
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
          class="col-3 q-px-sm"
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
          class="col-2 q-px-sm"
        />
      </div>

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
          <div class="col-12 text-grey-6 q-my-md">
            پیشنهاد شده بر اساس رفتار و عملکرد شما
          </div>

          <div class="q-px-sm q-my-md col-4">
            <q-card flat bordered>
              <q-card-section horizontal>
                <q-card-section class="col-5 flex flex-center">
                  <q-img
                    class="rounded-borders"
                    src="https://cdn.quasar.dev/img/parallax2.jpg"
                  />
                </q-card-section>

                <q-card-section>
                  <div class="q-mt-sm q-mb-xs">توسعه دهنده فرانت</div>
                  <div class="text-caption">شرکت شبکه هوشمند امید</div>
                  <div class="text-caption text-grey">
                    <span>تهران،میرداماد |</span>
                    <span class="text-positive"> 20 - 25 </span>
                  </div>
                </q-card-section>
              </q-card-section>

              <q-separator inset />

              <q-card-actions class="q-px-sm">
                <q-btn flat> 6 روز پیش </q-btn>
                <q-space />
                <q-btn color="positive" label="ارسال رزومه" />
              </q-card-actions>
            </q-card>
          </div>

          <div class="q-px-sm q-my-md col-4">
            <q-card flat bordered>
              <q-card-section horizontal>
                <q-card-section class="col-5 flex flex-center">
                  <q-img
                    class="rounded-borders"
                    src="https://cdn.quasar.dev/img/parallax2.jpg"
                  />
                </q-card-section>

                <q-card-section>
                  <div class="q-mt-sm q-mb-xs">توسعه دهنده فرانت</div>
                  <div class="text-caption">شرکت شبکه هوشمند امید</div>
                  <div class="text-caption text-grey">
                    <span>تهران،میرداماد </span>
                  </div>
                </q-card-section>
              </q-card-section>

              <q-separator inset />

              <q-card-actions class="q-px-sm">
                <q-btn flat> 6 روز پیش </q-btn>
                <q-space />
                <q-btn color="positive" label="ارسال رزومه" />
              </q-card-actions>
            </q-card>
          </div>

          <div class="q-px-sm q-my-md col-4">
            <q-card flat bordered>
              <q-card-section horizontal>
                <q-card-section class="col-5 flex flex-center">
                  <q-img
                    class="rounded-borders"
                    src="https://cdn.quasar.dev/img/parallax2.jpg"
                  />
                </q-card-section>

                <q-card-section>
                  <div class="q-mt-sm q-mb-xs">توسعه دهنده فرانت</div>
                  <div class="text-caption">شرکت شبکه هوشمند امید</div>
                  <div class="text-caption text-grey">
                    <span>تهران،میرداماد</span>
                  </div>
                </q-card-section>
              </q-card-section>

              <q-separator inset />

              <q-card-actions class="q-px-sm">
                <q-btn flat> 6 روز پیش </q-btn>
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
        />
      </div>

      <q-card
        flat
        class="global-emplyment q-mt-md col-12 row justify-center content-center items-center"
      >
        <div class="col-10">
          <q-card-section
            class="row justify-between content-center items-center"
            horizontal
          >
            <q-card-section class="col-6">
              <div class="text-bold q-pb-md">استخدام‌های سراسری و دولتی</div>
              <div class="q-py-md">
                در این قسمت، آخرین فرصت‌های استخدام سراسری و دولتی به‌طور مرتب
                به‌روزرسانی و منتشر می‌شوند. به صفحه استخدام‌های سراسری سر بزنید
                و از بررسی روزانه ده‌ها سایت و مرجع خبری دیگر بی‌نیاز شوید.
              </div>

              <q-btn
                class="q-my-md"
                outline
                color="black"
                label="مشاهده فرصت های شغلی"
              />
            </q-card-section>

            <div class="col-4">
              <q-img
                style="width: 80%; height: 80%"
                src="https://cdn.quasar.dev/img/parallax2.jpg"
              />
            </div>
          </q-card-section>
        </div>
      </q-card>

      <div class="col-12 q-my-md row">
        <div class="col-12 row justify-center items-center">
          <div class="q-px-md">به روز رسانی‌های سایت</div>

          <q-separator style="height: 1px" class="col-10" inset />
        </div>

        <q-list class="q-my-md col-12 row items-center" disable>
          <q-item class="col-12">
            <q-item-section avatar>
              <q-icon size="20px" color="grey-5" name="done" />
            </q-item-section>

            <q-item-section class="text-grey-5"
              >در صفحه مشاغل پیشنهادی، برای مرتب سازی موقعیت‌های شغلی گزینه
              بیشترین حقوق هم اضافه شد.
            </q-item-section>

            <q-item-section side>
              <q-badge color="green-2" text-color="green-9"> جدید </q-badge>
            </q-item-section>
          </q-item>

          <q-item class="col-12">
            <q-item-section avatar>
              <q-icon size="20px" color="grey-5" name="done" />
            </q-item-section>

            <q-item-section class="text-grey-5"
              >از این پس در صورتی که کارجو جزو اتباع خارجی باشد می‌تواند در
              رزومه ساز جاب ویژن ملیت خود را اعلام کند.
            </q-item-section>

            <q-item-section side>
              <q-badge color="green-2" text-color="green-9"> جدید </q-badge>
            </q-item-section>
          </q-item>

          <q-item class="col-12">
            <q-item-section avatar>
              <q-icon size="20px" color="grey-5" name="done" />
            </q-item-section>

            <q-item-section class="text-grey-5">
              در صفحه فرصت های شغلی، برای فیلتر حقوق دو بازه جدید «۳۵ تا ۶۰
              میلیون» و «بالای ۶۰ میلیون» اضافه شدند.
            </q-item-section>
          </q-item>

          <q-item class="col-12">
            <q-item-section avatar>
              <q-icon size="20px" color="grey-5" name="done" />
            </q-item-section>

            <q-item-section class="text-grey-5">
              طراحی جدید برای صفحه اصلی جاب ویژن منتشر شد.
            </q-item-section>
          </q-item>
        </q-list>
      </div>
    </div>
  </q-page>
</template>

<script>
import { ref } from "vue";

export default {
  setup() {
    return {
      model: ref(null),
      tab: ref("suggestions"),
      options: ["Google", "Facebook", "Twitter", "Apple", "Oracle"],
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
  background-color: #f8f9fa;
}

.text-muted {
  color: #8e9cb2 !important;
}

[dir="rtl"] .q-item__section--side {
  padding-left: 0;
}
</style>
