<template>
  <q-page style="background-color: #f8f9fa">
    <div class="row justify-center">
      <div class="col-8">
        <div class="q-pr-lg">
          <div class="col-12 row q-mt-lg q-mb-md">
            <div class="full-width bg-white br-10">
              <div class="col-12">
                <q-img
                  style="
                    border-top-right-radius: 10px;
                    border-top-left-radius: 10px;
                  "
                  src="https://fileapi.jobvision.ir/api/v1.0/files/getimage?fileid=1240649&width=1440&height=280"
                />
              </div>

              <div class="col-12">
                <div class="q-px-lg">
                  <div class="row">
                    <div
                      class="col-12 q-mt-sm q-mb-md row justify-center items-center q-ml-md"
                    >
                      <q-item class="col-12 q-my-xs">
                        <q-item-section avatar>
                          <q-avatar size="95px">
                            <q-img
                              src="https://fileapi.jobvision.ir/api/v1.0/files/getimage?fileid=153717&width=119&height=119"
                            />
                          </q-avatar>
                        </q-item-section>

                        <q-item-section class="q-pa-md q-ml-xl">
                          <q-item-label class="text-bold text-h5 row">
                            تربت پاک

                            <div class="q-px-md">
                              <span class="q-pr-xs" style="font-size: 16px"
                                >3.5</span
                              >
                              <q-icon
                                size="24px"
                                color="orange-4"
                                name="star"
                              />
                            </div>
                          </q-item-label>

                          <div class="text-grey-7 q-pb-sm q-my-md">
                            <span
                              class="q-pr-md text-grey-8"
                              style="font-size: 12px"
                              >https://torbatepak.com/</span
                            >

                            <span>تا 200 نفر</span>
                          </div>

                          <div class="text-grey-7">
                            سرمایه گذار و پیمانکار پروژه های ساختمانی، نفت، گاز
                            و معادن
                          </div>
                        </q-item-section>

                        <q-item-section class="q-pa-sm row q-mr-lg" side>
                          <div class="absolute-bottom-right">
                            <q-btn
                              color="primary"
                              class="text-white q-mr-md"
                              label="دنبال کنید"
                              icon="add"
                            />

                            <q-btn
                              color="primary"
                              outline
                              label="امتیاز به شرکت"
                            />
                          </div>
                        </q-item-section>
                      </q-item>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-12 row q-my-md">
            <div class="col-9">
              <div class="q-px-sm full-width bg-white br-10">
                <q-tabs
                  active-class="active-tab"
                  indicator-color="transparent"
                  v-model="tab"
                  align="left"
                >
                  <q-tab name="about" label="درباره شرکت" />

                  <q-tab name="opportunity" label="فرصت‌های شغلی (8)" />

                  <q-tab name="charts" label="سازمان از نگاه آمار" />

                  <q-tab name="members" label="معرفی اعضای سازمان" />
                </q-tabs>
              </div>
            </div>

            <div class="col-3 row justify-end">
              <div class="q-px-sm full-width">
                <div class="bg-white br-10">
                  <q-expansion-item
                    expand-icon-class="text-primary"
                    class="text-bold"
                    expand-separator
                    label="سوابق ارسال رزومه برای این شرکت"
                  >
                    <div class="full-width text-center">
                      <div class="text-grey-6 q-py-lg text-weight-regular">
                        تاکنون رزومه‌ای برای این شرکت ارسال نکرده اید!
                      </div>

                      <q-img
                        width="245px"
                        height="165px"
                        src="https://jobvision.ir/assets/images/jobs/no-apply-history.svg"
                      />
                    </div>
                  </q-expansion-item>
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
  setup() {
    const tab = ref("about");

    return {
      tab,
    };
  },
};
</script>

<style scoped>
[dir="rtl"] .q-item__section--side {
  padding: 0;
}

.q-badge {
  background-color: transparent;
  color: green;
  border-radius: 0;
  width: 39px;
  height: 22px;
}

.q-tab-panels {
  background-color: transparent;
}

.q-tab-panel {
  padding: 0;
}

.q-item {
  padding: 0;
}

.br-8 {
  border-radius: 8px;
}

.br-10 {
  border-radius: 10px !important;
}

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
  border-bottom: 3px solid;
  border-color: #5660f2 !important;
  font-weight: bold !important;
  color: #5660f2;
}
</style>
