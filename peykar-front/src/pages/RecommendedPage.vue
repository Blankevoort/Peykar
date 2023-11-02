<template>
  <q-page style="background-color: #f8f9fa">
    <div class="row justify-center">
      <!-- Inputs -->

      <div style="background-color: white" class="col-12 row justify-center">
        <div class="col-8 row justify-center q-my-md">
          <q-select
            class="col-4 q-pl-lg"
            outlined
            v-model="model"
            :options="options"
            label="عنوان شغلی یا شرکت"
            use-input
            hide-selected
            fill-input
            hide-dropdown-icon
          >
            <template v-slot:prepend>
              <q-icon name="search" />
            </template>
          </q-select>

          <q-select
            class="col-3"
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
            class="col-2 q-px-sm text-weight-bold"
          />
        </div>
      </div>

      <!-- tabs -->

      <div class="col-8 row q-my-md q-pl-lg">
        <div class="col-3 q-px-sm">
          <q-card class="row" bordered>
            <q-tabs
              inline-label
              vertical
              indicator-color="transparent"
              active-class="active-tab"
              v-model="tab"
            >
              <q-tab
                icon="upload_file"
                class="text-black"
                style="background: white; border-radius: 8px"
                name="CVSent"
                label="رزومه های ارسال شده"
              />

              <q-tab
                icon="star_outline"
                class="text-black"
                style="background: white; border-radius: 8px"
                name="suggestion"
                label="مشاغل پیشنهادی"
              />

              <q-tab
                icon="favorite_outline"
                class="text-black"
                style="background: white; border-radius: 8px"
                name="savedOffers"
                label="مشاغل نشان شده"
              />

              <q-tab
                icon="apartment"
                class="text-black"
                style="background: white; border-radius: 8px"
                name="followingCompanies"
                label="شرکت های دنبال شده"
              />
            </q-tabs>
          </q-card>
        </div>

        <!-- tabs Content -->

        <q-tab-panels
          class="col-9"
          v-model="tab"
          animated
          swipeable
          vertical
          transition-prev="jump-up"
          transition-next="jump-up"
        >
          <q-tab-panel class="row" name="suggestion">
            <!-- jobs Count and Sorting -->

            <div class="col-9 row">
              <div
                style="background-color: black"
                class="col-12 q-mb-xs row justify-between"
              >
                <div class="col-6 q-px-md q-my-md">40396 فرصت شغلی</div>

                <div class="col-6 q-px-md text-right">
                  <q-btn-dropdown
                    class="q-my-sm"
                    label="منطبق ترین"
                    dropdown-icon="expand_more"
                    icon="sort"
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

              <!-- jobs List -->

              <div
                class="col-12 row justify-between content-center items-center q-my-md"
              >
                <div class="col-12 q-my-xs row justify-center items-center">
                  <q-list
                    class="custom-border col-12 bg-white q-my-sm"
                    bordered
                    separator
                  >
                    <q-item class="col-12 q-my-xs">
                      <q-item-section class="q-pa-md" top avatar>
                        <q-avatar>
                          <img
                            src="https://cdn.quasar.dev/img/boy-avatar.png"
                          />
                        </q-avatar>
                        <q-badge class="q-mt-sm">
                          5.0
                          <q-icon
                            name="star"
                            color="green"
                            text-color="green"
                            class="q-ml-xs"
                          />
                        </q-badge>
                      </q-item-section>

                      <q-item-section caption class="q-pa-md">
                        <div class="row">
                          <q-badge
                            class="q-my-xs q-mx-xs"
                            color="red-1"
                            text-color="negative"
                            label="فوری"
                          />
                        </div>

                        <q-item-label class="text-weight-bold"
                          >نام فرصت شغلی</q-item-label
                        >
                        <q-item-label class="text-weight-thin q-pt-xs">
                          نام شرکت
                        </q-item-label>
                        <q-item-label caption>
                          شهر محل کار <span class="text-grey-5"> | </span>
                          <span class="text-positive"
                            >20 - 25 میلیون تومان</span
                          ></q-item-label
                        >
                      </q-item-section>

                      <q-item-section class="q-pa-md" side top>
                        <q-btn flat icon="favorite_outline" />
                        <q-btn flat icon="block" />
                      </q-item-section>
                    </q-item>

                    <div class="row justify-center q-my-md">
                      <q-separator class="col-10 q-px-md" style="height: 1px" />

                      <div class="col-12 row justify-center q-mt-sm">
                        <div class="col-10 row justify-between items-center">
                          <div class="col-3">17 روز پیش</div>

                          <div class="col-4 row justify-end">
                            <q-btn color="positive" label="ارسال رزمه" />
                          </div>
                        </div>
                      </div>
                    </div>
                  </q-list>

                  <q-list
                    class="custom-border col-12 bg-white q-my-sm"
                    bordered
                    separator
                  >
                    <q-item class="col-12 q-my-xs">
                      <q-item-section class="q-pa-md" top avatar>
                        <q-avatar>
                          <img
                            src="https://cdn.quasar.dev/img/boy-avatar.png"
                          />
                        </q-avatar>
                        <q-badge class="q-mt-sm">
                          4.4
                          <q-icon
                            name="star"
                            color="green"
                            text-color="green"
                            class="q-ml-xs"
                          />
                        </q-badge>
                      </q-item-section>

                      <q-item-section caption class="q-pa-md">
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

                    <div class="row justify-center q-my-md">
                      <q-separator class="col-10 q-px-md" style="height: 1px" />

                      <div class="col-12 row justify-center q-mt-sm">
                        <div class="col-10 row justify-between items-center">
                          <div class="col-3">امروز</div>

                          <div class="col-4 row justify-end">
                            <q-btn color="positive" label="ارسال رزمه" />
                          </div>
                        </div>
                      </div>
                    </div>
                  </q-list>
                </div>
              </div>
            </div>

            <!-- LeftSide Content -->

            <div class="col-3 row justify-center q-pl-sm">
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
                <div class="col-8">
                  دریافت ایمیل و پیامک فرصت های شغلی پیشنهادی
                </div>
                <q-toggle class="col-4" v-model="getMessage" color="green" />
              </div>
            </div>
          </q-tab-panel>
        </q-tab-panels>
      </div>
    </div>
  </q-page>
</template>

<script>
import { ref } from "vue";

export default {
  setup() {
    const getMessage = ref(true);
    const tab = ref("suggestion");

    return {
      getMessage,
      tab,
      options: ["Google", "Facebook", "Twitter", "Apple", "Oracle"],
      model: ref(null),
    };
  },
};
</script>

<style scoped>
.q-badge {
  background-color: transparent;
  color: green;
}

.q-tab-panels {
  background-color: transparent;
}

.q-tab-panel {
  padding: 0;
}

.active-tab {
  border-left: 3px solid;
  border-color: #5660f2 !important;
  border-top-left-radius: 0px !important;
  border-bottom-left-radius: 0px !important;
}

.active-sort-type {
  background-color: #5660f2 !important;
  color: white !important;
}

.custom-border {
  border-radius: 10px !important;
  border: 2px solid #dde1e6;
}
</style>
