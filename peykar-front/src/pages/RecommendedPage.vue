<template>
  <q-page style="background-color: #f8f9fa">
    <div class="row justify-center">
      <div class="col-8 row justify-center q-my-md">
        
        <div class="col-3 row justify-center q-px-sm">
          <q-card bordered>
            <q-tabs class="row" active-class="active-tab" v-model="tab">
              <q-tab
                class="q-mx-xs text-black"
                style="background: white; border-radius: 8px"
                name="recent"
                label="جدیدترین"
              />

              <q-tab
                class="q-mx-xs text-black"
                style="background: white; border-radius: 8px"
                name="suitable"
                label="منطبق ترین"
              />

              <q-tab
                class="q-mx-xs text-black"
                style="background: white; border-radius: 8px"
                name="mostSalary"
                label="بیشترین حقوق"
              />
            </q-tabs>
          </q-card>
        </div>

        <div class="col-6 row justify-center q-px-sm">
          <div
            class="col-12 q-my-xs row justify-between items-center"
            style="background-color: white"
          >
            <div class="col-6 q-px-md">40396 فرصت شغلی</div>

            <div class="col-6 q-px-md text-right">
              <q-btn-dropdown
                class="q-my-sm"
                label="منطبق ترین"
                dropdown-icon="expand_more"
                icon="sort"
                flat
              >
                <q-tabs active-class="active-tab" v-model="tab">
                  <q-tab
                    class="q-mx-xs text-black"
                    style="background: white; border-radius: 8px; width: 60px"
                    name="recent"
                    label="جدیدترین"
                  />

                  <q-tab
                    class="q-mx-xs text-black"
                    style="background: white; border-radius: 8px; width: 40px"
                    name="suitable"
                    label="منطبق ترین"
                  />

                  <q-tab
                    class="q-mx-xs text-black"
                    style="background: white; border-radius: 8px; width: 40px"
                    name="mostSalary"
                    label="بیشترین حقوق"
                  />
                </q-tabs>
              </q-btn-dropdown>
            </div>
          </div>

          <div
            class="col-12 row justify-between content-center items-center bg-white q-my-md"
          >
            <div class="col-12 q-my-xs row justify-center items-center">
              <q-item
                style="background-color: white; border-radius: 8px"
                class="col-12 q-my-xs"
              >
                <q-item-section class="q-pa-md" top avatar>
                  <q-avatar>
                    <img src="https://cdn.quasar.dev/img/boy-avatar.png" />
                  </q-avatar>
                </q-item-section>

                <q-item-section caption class="q-pa-md">
                  <div class="row">
                    <q-badge
                      class="q-my-xs q-mx-xs"
                      color="indigo-1"
                      text-color="primary"
                      label="کارفرمای پاسخگو"
                    />

                    <q-badge
                      class="q-my-xs q-mx-xs"
                      color="indigo-1"
                      text-color="primary"
                      label="درحال بررسی رزومه"
                    />

                    <q-badge
                      class="q-my-xs q-mx-xs"
                      color="indigo-1"
                      text-color="primary"
                      label="جدید"
                    />
                  </div>

                  <q-item-label class="text-weight-bold"
                    >نام فرصت شغلی</q-item-label
                  >
                  <q-item-label class="text-weight-thin q-pt-xs">
                    نام شرکت
                  </q-item-label>
                  <q-item-label caption> شهر محل کار </q-item-label>
                </q-item-section>

                <q-item-section class="q-pa-md" side top>
                  <q-btn flat icon="favorite_outline" />
                  <q-btn flat icon="block" />
                </q-item-section>
              </q-item>
            </div>
          </div>
        </div>

        <div class="col-3 row justify-center q-px-sm">
          <q-card class="shadow-2">
            <q-card-section>
              <div class="text-weight-medium">
                <q-icon name="work" />
                تنظیمات فرصت‌های شغلی پیشنهادی
              </div>
            </q-card-section>

            <q-separator />

            <div class="row">
              <div class="q-my-md col-12">
                <div class="text-caption text-grey-6 q-mx-sm">
                  استان های مورد علاقه
                </div>
                <div class="q-mt-sm q-mx-sm">همه استان‌ها</div>
                <!-- <q-skeleton class="q-mt-sm q-mx-sm" type="rect" /> -->
              </div>

              <div class="q-my-md col-12">
                <div class="text-caption text-grey-6 q-mx-sm">
                  حوزه‌های شغلی مورد علاقه
                </div>
                <div class="q-mt-sm q-mx-sm">
                  توسعه نرم افزار و برنامه نویسی
                </div>
                <!-- <q-skeleton class="q-mt-sm q-mx-sm" type="rect" /> -->
              </div>

              <div class="q-my-md col-12">
                <div class="text-caption text-grey-6 q-mx-sm">
                  نوع همکاری مورد نظر
                </div>
                <div class="q-mt-sm q-mx-sm">
                  تمام وقت، پاره وقت، قراردادی / پروژه ای
                </div>
                <!-- <q-skeleton class="q-mt-sm q-mx-sm" type="rect" /> -->
              </div>

              <div class="q-my-md col-12">
                <q-separator class="q-mb-lg" />

                <div class="text-caption text-grey-6 q-mx-sm">
                  تمایل به دورکاری
                </div>
                <div class="q-mt-sm q-mx-sm">دورکاری، حضوری</div>
                <!-- <q-skeleton class="q-mt-sm q-mx-sm" type="rect" /> -->
              </div>

              <div class="q-my-md col-12 text-center">
                <q-separator class="q-mb-md" />

                <q-btn
                  style="font-size: 17px"
                  flat
                  color="primary"
                  label="ویرایش"
                  icon="edit"
                />
              </div>
            </div>
          </q-card>

          <div
            class="row justify-center shadow-2 q-my-md q-pa-md"
            style="background: white; border-radius: 4px"
          >
            <div class="col-8">دریافت ایمیل و پیامک فرصت های شغلی پیشنهادی</div>
            <q-toggle class="col-4" v-model="getMessage" color="green" />
          </div>
        </div>
      </div>
    </div>
  </q-page>
</template>

<script>
import { ref } from "vue";

export default {
  setup() {
    const getMessage = ref(true);
    const tab = ref("suitable");

    return {
      getMessage,
      tab,
    };
  },
};
</script>

<style scoped>
.active-tab {
  background-color: #5660f2 !important;
  color: white !important;
}
</style>
