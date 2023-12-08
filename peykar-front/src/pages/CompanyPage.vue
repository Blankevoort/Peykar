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

              <div class="q-px-sm full-width bg-white">
                <q-tab-panels v-model="tab" animated>
                  <!-- About Company -->

                  <q-tab-panel class="row" name="about">
                    <div class="col-10 row">
                      <!-- Core Information -->

                      <div class="col-12">
                        <div class="row">
                          <div class="col-4 q-px-sm q-my-md">
                            <div class="text-bold">سال تاسیس</div>

                            <div
                              class="text-grey-7"
                              style="margin-bottom: 35px; margin-top: 35px"
                            >
                              1368
                            </div>

                            <div class="text-bold">نوع فعالیت</div>

                            <div class="text-grey-7 q-mt-sm">
                              شرکت ایرانی دارای مشتریان داخلی
                            </div>
                          </div>

                          <div class="col-4 q-px-sm q-my-md">
                            <div class="text-bold">صنعت</div>

                            <div class="text-grey-7 q-mt-sm q-mb-md">
                              <div>نفت، گاز و پتروشیمی</div>
                              <div>شرکت های خدماتی / پیمانکاران</div>
                              <div>ساختمان / مصالح و تجهیزات ساختمانی</div>
                            </div>

                            <div class="text-bold q-mb-sm">آدرس وبسایت</div>

                            <a
                              class="text-grey-7"
                              href="https://torbatepak.com/"
                              style="text-decoration: none"
                              >torbatepak.com</a
                            >
                          </div>

                          <div class="col-4 q-px-sm q-my-md">
                            <div class="text-bold">نوع مالکیت</div>

                            <div class="q-my-lg text-grey-7">خصوصی</div>
                          </div>
                        </div>
                      </div>

                      <!-- Users Rating -->

                      <div class="col-12" style="font-size: 16px">
                        <div class="text-bold">امتیاز سازمان</div>

                        <div class="row q-my-sm">
                          <div class="text-bold q-pr-sm">3.5</div>

                          <q-rating
                            v-model="ratingModel"
                            max="5"
                            size="1.5em"
                            color="amber-8"
                            icon="star_border"
                            icon-selected="star"
                            icon-half="star_half"
                            no-dimming
                            readonly
                          />
                        </div>
                      </div>

                      <!-- ScreenShots From Company -->

                      <div class="col-12 q-my-md q-mt-lg">
                        <div class="text-bold text-h6">معرفی تصویری سازمان</div>

                        <div class="col-12 flex justify-center">
                          <q-carousel
                            swipeable
                            animated
                            v-model="slide"
                            thumbnails
                            infinite
                          >
                            <q-carousel-slide
                              :name="1"
                              img-src="https://cdn.quasar.dev/img/mountains.jpg"
                            />
                            <q-carousel-slide
                              :name="2"
                              img-src="https://cdn.quasar.dev/img/parallax1.jpg"
                            />
                            <q-carousel-slide
                              :name="3"
                              img-src="https://cdn.quasar.dev/img/parallax2.jpg"
                            />
                            <q-carousel-slide
                              :name="4"
                              img-src="https://cdn.quasar.dev/img/quasar.jpg"
                            />
                          </q-carousel>
                        </div>
                      </div>
                    </div>
                  </q-tab-panel>

                  <!-- Opportunities On Company -->

                  <q-tab-panel name="opportunity">
                    <div class="text-h6">opportunity</div>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit.
                  </q-tab-panel>

                  <!-- Charts Of Company -->

                  <q-tab-panel name="charts">
                    <div class="text-h6">Charts</div>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit.
                  </q-tab-panel>

                  <!-- Members Of Company -->

                  <q-tab-panel name="members">
                    <div class="text-h6">Members</div>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit.
                  </q-tab-panel>
                </q-tab-panels>
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
    const slide = ref(1);

    return {
      tab,
      slide,
      ratingModel: ref(3.5),
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
