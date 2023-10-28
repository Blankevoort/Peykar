<template>
  <q-page style="background-color: #f8f9fa">
    <div class="row justify-center content-center">
      <div class="col-12 row justify-center" style="background-color: white">
        <div class="col-8">
          <div class="row justify-center content-center items-center q-my-md">
            <div class="col-12 row">
              <q-select
                hide-dropdown-icon
                class="col-3"
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
                class="col-4 q-px-sm"
                hide-dropdown-icon
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
                style="height: 55px"
              />
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

      <div class="col-12 row justify-center q-my-md">
        <div class="col-8">
          <div class="row justify-between items-start content-center q-my-md">
            <div class="col-6 q-px-sm row justify-center">
              <q-btn
                color="primary"
                class="col-12 q-mb-sm"
                label="امکان استعلام معلولین"
                icon="notification_add"
                style="height: 50px"
              />

              <div
                class="col-12 q-my-xs row justify-between items-center"
                style="background-color: white"
              >
                <div class="col-6 q-px-md">40396 فرصت شغلی فعال</div>

                <div class="col-6 q-px-md text-right">
                  مرتب سازی:

                  <q-btn-dropdown
                    class="q-my-sm"
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
                </div>
              </div>

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
                    <q-item-label>نام فرصت شغلی</q-item-label>
                    <q-item-label caption>
                      توضیحات کلی درباره فرصت شغلی

                      <br />
                      <br />
                      Lorem ipsum dolor sit amet consectetur adipisicing elit.
                      Placeat iusto molestiae sequi quam deleniti illum
                      <br />
                      <br />
                      <span>امروز</span>
                    </q-item-label>
                  </q-item-section>

                  <q-item-section class="q-pa-md" side top>
                    <q-btn flat icon="favorite_outline" />
                  </q-item-section>
                </q-item>
              </div>

              <div class="col-12 row justify-center items-center q-my-md">
                <q-tabs v-model="tab">
                  <q-tab
                    class="q-mx-xs text-black"
                    style="background: white; border-radius: 8px; width: 60px"
                    name="pageOne"
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
                    class="q-mx-xs text-white"
                    style="background: #5660f2; border-radius: 8px; width: 40px"
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
                    class="q-mx-xs text-black"
                    style="background: white; border-radius: 8px; width: 60px"
                    name="pageOne"
                    label="آخرین"
                  />
                </q-tabs>
              </div>
            </div>

            <div
              class="col-6 q-px-sm row justify-center full-height"
              style="background-color: white"
            >
              <q-card
                class="col-8 row justify-center q-my-xl q-my-xl q-px-md q-pa-md"
              >
                <div class="text-weight-bold q-my-md" style="font-size: 18px">
                  اطلاع رسانی شغلی
                </div>

                <div class="text-weight-medium q-my-md">
                  عنوان شغلی و شهر مورد نظر خود را وارد نمایید و جدیدترین آگهی
                  های شغلی را در ایمیل خود دریافت کنید.
                </div>

                <q-input
                  filled
                  class="col-12 q-px-md q-my-sm"
                  label="عنوان شغل"
                />

                <q-input filled class="col-12 q-px-md q-my-sm" label="شهر">
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
  </q-page>
</template>

<script>
import { ref } from "vue";

export default {
  setup() {
    return {
      model: ref(null),
      tab: ref("suggestions"),
      group: ref("op1"),
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
</style>
