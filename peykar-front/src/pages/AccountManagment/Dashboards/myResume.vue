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

          <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 col-xl-8"></div>

          <!-- Left Side -->

          <div class="gt-md col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
            <!-- Resume Complition Rate Card -->

            <div class="q-py-md q-px-lg br-10 bg-white">
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

              <div >
                <div class="text-bold">افزودن بخش های تکمیلی</div>

                <div class="row q-py-sm">
                  <q-btn flat color="primary" label="کتاب‌ها و مقالات" />

                  <q-separator vertical />

                  <q-btn
                    flat
                    color="primary"
                    label="پروژه‌ها و تجربیات آکادمیک"
                  />

                  <q-separator vertical />

                  <q-btn flat color="primary" label="+ 3 مورد دیگر" />
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
import { ref } from "vue";

export default {
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
  },

  setup() {
    const preferred = ref("خودم");

    return {
      value: 100,
      preferred,
      preferredOptions: ["خودم", "کارفرما"],
    };
  },
};
</script>

<style scoped>
.brb-10 {
  border-bottom-left-radius: 10px;
  border-bottom-right-radius: 10px;
}

.br-10 {
  border-radius: 10px;
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
