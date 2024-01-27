<template>
  <q-page class="row justify-center">
    <!-- Medium-4k Screen Content -->

    <div
      class="col-md-12 col-lg-8 col-xl-8 row justify-between content-center items-center gt-sm q-px-xl"
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
        class="global-emplyment q-mt-md col-12 row justify-center content-center items-center q-py-lg"
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
          use-input
          hide-selected
          fill-input
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
          class="col-12 q-my-sm q-px-sm"
        />
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
          <div class="col-12 text-grey-6 q-my-md">
            پیشنهاد شده بر اساس رفتار و عملکرد شما
          </div>

          <div class="q-px-sm q-my-md col-12">
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

          <div class="q-px-sm q-my-md col-12">
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

          <div class="q-px-sm q-my-md col-12">
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
          to="jobs"
        />
      </div>

      <!-- Some Explanations About App -->

      <q-card
        flat
        class="q-mt-md col-12 row justify-center content-center items-center q-py-xl"
      >
        <div class="col-12 global-emplyment">
          <q-card-section class="row text-center">
            <div class="col-12">
              <q-img
                style="width: 70%; height: 100%"
                src="https://jobvision.ir/assets/images/home-page/global-employment.svg"
              />
            </div>

            <q-card-section class="col-12">
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
              />
            </q-card-section>
          </q-card-section>
        </div>
      </q-card>
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
