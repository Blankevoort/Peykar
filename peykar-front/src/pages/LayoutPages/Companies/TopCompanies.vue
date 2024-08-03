<template>
  <q-page style="background-color: #f8f9fa">
    <!-- Top Companies - Hero Section -->

    <div class="full-width">
      <div :style="dynamicBackground">
        <div class="q-py-xl">
          <div class="row justify-center">
            <div
              class="col-xs-12 col-sm-12 col-md-11 col-lg-8 col-xl-7 row justify-between"
            >
              <div class="col-xs-12 col-sm-12 lt-md row justify-center">
                <div
                  class="row br-10 col-xs-11 col-sm-11"
                  style="background-color: #5660f20d"
                >
                  <div
                    class="row justify-between items-center q-px-lg q-py-xl col-12"
                  >
                    <!-- Context -->

                    <div class="col-5">
                      <div class="text-bold text-h4">رده بندی</div>

                      <div class="text-weight-thin q-pt-xs">
                        شرکت‌های ایرانی
                      </div>
                    </div>

                    <!-- Star -->

                    <div class="col-4 row justify-end">
                      <q-img
                        style="width: 120px; height: 120px"
                        src="https://jobvision.ir/assets/images/top-companies/rating-star.svg"
                      />
                    </div>
                  </div>

                  <div class="full-width">
                    <q-separator inset />

                    <div :class="dynamicFont">
                      شرکت‌های معتبر ایرانی را بهتر بشناسید!
                    </div>
                  </div>
                </div>
              </div>

              <div :class="dynamicContainerPadding">
                <div class="full-width">
                  <div class="q-mt-lg">
                    <div class="full-width">
                      <div>
                        <div class="text-bold" :style="dynamicHeaderFont">
                          برترین شرکت‌های ایرانی
                        </div>

                        <div
                          class="text-weight-thin"
                          :style="dynamicHeaderFont"
                        >
                          براساس
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="full-width">
                  <div
                    class="full-width q-gutter-y-sm q-px-md"
                    style="font-size: 16px; border-right: 2px solid #8e9cb2"
                  >
                    <div class="row">
                      <div class="col-11 q-pt-xs">
                        <div class="row q-gutter-x-sm">
                          <img
                            src="https://jobvision.ir/assets/images/tick-success.svg"
                          />

                          <div :class="bestCompaniestListTexts">
                            محبوبیت (براساس بازدید کارجویان)
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-11">
                        <div class="row q-gutter-x-sm">
                          <img
                            src="https://jobvision.ir/assets/images/tick-success.svg"
                          />

                          <div :class="bestCompaniestListTexts">
                            پاسخگویی به رزومه‌های دریافتی
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-11">
                        <div class="row q-gutter-x-sm">
                          <img
                            src="https://jobvision.ir/assets/images/tick-success.svg"
                          />

                          <div :class="bestCompaniestListTexts">
                            تجربه کارجویان از جلسه مصاحبه
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Rating At Lagre -->

              <div class="gt-sm col-md-6 col-lg-6 col-xl-5 row justify-end">
                <div class="full-width">
                  <div class="br-10" style="background-color: #5660f20d">
                    <div
                      class="row justify-between items-center q-px-lg q-py-xl"
                    >
                      <div class="col-5">
                        <div class="text-bold text-h4">رده بندی</div>

                        <div class="text-weight-thin q-pt-xs">
                          شرکت‌های ایرانی
                        </div>
                      </div>

                      <div class="col-4 row justify-end">
                        <q-img
                          style="width: 120px; height: 120px"
                          src="https://jobvision.ir/assets/images/top-companies/rating-star.svg"
                        />
                      </div>
                    </div>

                    <div class="col-12">
                      <q-separator inset />

                      <div :class="dynamicFont">
                        شرکت‌های معتبر ایرانی را بهتر بشناسید!
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Top Companies List -->

    <div class="full-width q-pb-md">
      <div class="row justify-center">
        <div
          class="col-xs-11 col-sm-11 col-md-11 col-lg-8 col-xl-7 row justify-center"
        >
          <div :class="dynamicSpaceing" :style="dynamicMediumFont">
            برترین شرکت‌ها در هر صنعت
          </div>

          <div class="full-width">
            <div class="row justify-between q-gutter-y-lg">
              <div
                v-for="(item, index) in items"
                :key="index"
                class="col-xs-12 col-sm-12 col-md-6 col-lg-4 col-xl-4 q-px-lg"
              >
                <div class="row bg-white br-10">
                  <div class="full-width q-pt-md">
                    <div class="text-bold q-pl-sm" :style="dynamicSmallFont">
                      کالاهای مصرفی و تند گردش / خرده فروشی
                    </div>
                    <q-separator class="q-mt-md" />
                  </div>

                  <div class="full-width q-px-md q-mt-md">
                    <q-item>
                      <q-item-section top avatar>
                        <q-avatar
                          color="primary"
                          text-color="white"
                          icon="bluetooth"
                        />
                      </q-item-section>
                      <q-item-section>
                        <q-item-label :style="dynamicXSFont">
                          شرکت صنایع غذایی شیبا
                        </q-item-label>
                      </q-item-section>
                      <q-item-section top side>
                        <q-icon name="star" color="yellow" />
                        <span>4.99</span>
                      </q-item-section>
                    </q-item>
                  </div>

                  <div class="full-width q-px-md q-mt-md">
                    <q-item>
                      <q-item-section top avatar>
                        <q-avatar
                          color="primary"
                          text-color="white"
                          icon="bluetooth"
                        />
                      </q-item-section>
                      <q-item-section>
                        <q-item-label :style="dynamicXSFont">
                          شرکت صنایع غذایی شیبا
                        </q-item-label>
                      </q-item-section>
                      <q-item-section top side>
                        <q-icon name="star" color="yellow" />
                        <span>4.99</span>
                      </q-item-section>
                    </q-item>
                  </div>

                  <div class="full-width q-px-md q-mt-md">
                    <q-item>
                      <q-item-section top avatar>
                        <q-avatar
                          color="primary"
                          text-color="white"
                          icon="bluetooth"
                        />
                      </q-item-section>
                      <q-item-section>
                        <q-item-label :style="dynamicXSFont">
                          شرکت صنایع غذایی شیبا
                        </q-item-label>
                      </q-item-section>
                      <q-item-section top side>
                        <q-icon name="star" color="yellow" />
                        <span>4.99</span>
                      </q-item-section>
                    </q-item>
                  </div>

                  <div class="full-width q-px-md q-mt-md">
                    <q-item>
                      <q-item-section top avatar>
                        <q-avatar
                          color="primary"
                          text-color="white"
                          icon="bluetooth"
                        />
                      </q-item-section>
                      <q-item-section>
                        <q-item-label :style="dynamicXSFont">
                          شرکت صنایع غذایی شیبا
                        </q-item-label>
                      </q-item-section>
                      <q-item-section top side>
                        <q-icon name="star" color="yellow" />
                        <span>4.99</span>
                      </q-item-section>
                    </q-item>
                  </div>

                  <div class="full-width q-px-md q-mt-md">
                    <q-item>
                      <q-item-section top avatar>
                        <q-avatar
                          color="primary"
                          text-color="white"
                          icon="bluetooth"
                        />
                      </q-item-section>
                      <q-item-section>
                        <q-item-label :style="dynamicXSFont">
                          شرکت صنایع غذایی شیبا
                        </q-item-label>
                      </q-item-section>
                      <q-item-section top side>
                        <q-icon name="star" color="yellow" />
                        <span>4.99</span>
                      </q-item-section>
                    </q-item>
                  </div>

                  <div class="full-width">
                    <q-separator class="q-my-md" style="height: 1px" />
                    <div class="q-mb-md text-center">
                      <q-btn flat dense color="primary" label="مشاهده بیشتر" />
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <q-btn
            class="q-mt-lg col-xs-10 col-sm-10 col-md-4 col-lg-3 col-xl-3"
            color="primary"
            label="مشاهده تمام شرکت ها"
            to="companies"
          />
        </div>
      </div>
    </div>

    <!-- Top Companies Slider -->

    <div class="q-pb-md q-mt-xl full-width">
      <div class="row justify-center">
        <div class="col-xs-11 col-sm-11 col-md-11 col-lg-8 col-xl-7">
          <div
            class="text-center text-bold text-grey-8"
            :style="dynamicMediumFont"
          >
            با برخی از همراهان جاب ویژن، بیشتر آشنا شوید.
          </div>

          <!-- Companies List -->

          <div class="full-width q-my-md">
            <swiper
              :slidesPerView="4"
              :spaceBetween="30"
              :autoplay="{
                delay: 2500,
                disableOnInteraction: false,
              }"
              class="gt-md"
            >
              <q-tabs
                indicator-color="transparent"
                active-class="active-tab"
                model="tab"
                outside-arrows
                mobile-arrows
              >
                <q-tab name="nameOne">
                  <swiper-slide>
                    <div class="q-pa-md flex justify-center" flat>
                      <q-item>
                        <q-item-section avatar>
                          <q-avatar size="60px">
                            <img src="https://cdn.quasar.dev/img/avatar2.jpg" />
                          </q-avatar>
                        </q-item-section>

                        <q-item-section>
                          <q-item-label>شرکت تربت پاک</q-item-label>
                          <q-item-label class="q-pt-sm" caption
                            >501 تا 1000 نفر</q-item-label
                          >
                        </q-item-section>
                      </q-item>
                    </div>
                  </swiper-slide>
                </q-tab>

                <q-tab name="nameTwo">
                  <swiper-slide>
                    <div class="q-pa-md flex justify-center" flat>
                      <q-item>
                        <q-item-section avatar>
                          <q-avatar size="60px">
                            <img src="https://cdn.quasar.dev/img/avatar2.jpg" />
                          </q-avatar>
                        </q-item-section>

                        <q-item-section>
                          <q-item-label>شرکت تربت پاک</q-item-label>
                          <q-item-label class="q-pt-sm" caption
                            >501 تا 1000 نفر</q-item-label
                          >
                        </q-item-section>
                      </q-item>
                    </div>
                  </swiper-slide>
                </q-tab>

                <q-tab name="nameThree">
                  <swiper-slide>
                    <div class="q-pa-md flex justify-center" flat>
                      <q-item>
                        <q-item-section avatar>
                          <q-avatar size="60px">
                            <img src="https://cdn.quasar.dev/img/avatar2.jpg" />
                          </q-avatar>
                        </q-item-section>

                        <q-item-section>
                          <q-item-label>شرکت تربت پاک</q-item-label>
                          <q-item-label class="q-pt-sm" caption
                            >501 تا 1000 نفر</q-item-label
                          >
                        </q-item-section>
                      </q-item>
                    </div>
                  </swiper-slide>
                </q-tab>

                <q-tab name="nameFour">
                  <swiper-slide>
                    <div class="q-pa-md flex justify-center" flat>
                      <q-item>
                        <q-item-section avatar>
                          <q-avatar size="60px">
                            <img src="https://cdn.quasar.dev/img/avatar2.jpg" />
                          </q-avatar>
                        </q-item-section>

                        <q-item-section>
                          <q-item-label>شرکت تربت پاک</q-item-label>
                          <q-item-label class="q-pt-sm" caption
                            >501 تا 1000 نفر</q-item-label
                          >
                        </q-item-section>
                      </q-item>
                    </div>
                  </swiper-slide>
                </q-tab>

                <q-tab name="nameFive">
                  <swiper-slide>
                    <div class="q-pa-md flex justify-center" flat>
                      <q-item>
                        <q-item-section avatar>
                          <q-avatar size="60px">
                            <img src="https://cdn.quasar.dev/img/avatar2.jpg" />
                          </q-avatar>
                        </q-item-section>

                        <q-item-section>
                          <q-item-label>شرکت تربت پاک</q-item-label>
                          <q-item-label class="q-pt-sm" caption
                            >501 تا 1000 نفر</q-item-label
                          >
                        </q-item-section>
                      </q-item>
                    </div>
                  </swiper-slide>
                </q-tab>

                <q-tab name="nameSix">
                  <swiper-slide>
                    <div class="q-pa-md flex justify-center" flat>
                      <q-item>
                        <q-item-section avatar>
                          <q-avatar size="60px">
                            <img src="https://cdn.quasar.dev/img/avatar2.jpg" />
                          </q-avatar>
                        </q-item-section>

                        <q-item-section>
                          <q-item-label>شرکت تربت پاک</q-item-label>
                          <q-item-label class="q-pt-sm" caption
                            >501 تا 1000 نفر</q-item-label
                          >
                        </q-item-section>
                      </q-item>
                    </div>
                  </swiper-slide>
                </q-tab>
              </q-tabs>
            </swiper>

            <swiper
              :slidesPerView="3"
              :spaceBetween="30"
              :autoplay="{
                delay: 2500,
                disableOnInteraction: false,
              }"
              class="gt-sm lt-lg"
            >
              <q-tabs
                indicator-color="transparent"
                active-class="active-tab"
                model="tab"
                outside-arrows
                mobile-arrows
              >
                <q-tab name="nameOne">
                  <swiper-slide>
                    <div class="q-pa-md flex justify-center" flat>
                      <q-item>
                        <q-item-section avatar>
                          <q-avatar size="60px">
                            <img src="https://cdn.quasar.dev/img/avatar2.jpg" />
                          </q-avatar>
                        </q-item-section>

                        <q-item-section>
                          <q-item-label>شرکت تربت پاک</q-item-label>
                          <q-item-label class="q-pt-sm" caption
                            >501 تا 1000 نفر</q-item-label
                          >
                        </q-item-section>
                      </q-item>
                    </div>
                  </swiper-slide>
                </q-tab>

                <q-tab name="nameTwo">
                  <swiper-slide>
                    <div class="q-pa-md flex justify-center" flat>
                      <q-item>
                        <q-item-section avatar>
                          <q-avatar size="60px">
                            <img src="https://cdn.quasar.dev/img/avatar2.jpg" />
                          </q-avatar>
                        </q-item-section>

                        <q-item-section>
                          <q-item-label>شرکت تربت پاک</q-item-label>
                          <q-item-label class="q-pt-sm" caption
                            >501 تا 1000 نفر</q-item-label
                          >
                        </q-item-section>
                      </q-item>
                    </div>
                  </swiper-slide>
                </q-tab>

                <q-tab name="nameThree">
                  <swiper-slide>
                    <div class="q-pa-md flex justify-center" flat>
                      <q-item>
                        <q-item-section avatar>
                          <q-avatar size="60px">
                            <img src="https://cdn.quasar.dev/img/avatar2.jpg" />
                          </q-avatar>
                        </q-item-section>

                        <q-item-section>
                          <q-item-label>شرکت تربت پاک</q-item-label>
                          <q-item-label class="q-pt-sm" caption
                            >501 تا 1000 نفر</q-item-label
                          >
                        </q-item-section>
                      </q-item>
                    </div>
                  </swiper-slide>
                </q-tab>

                <q-tab name="nameFour">
                  <swiper-slide>
                    <div class="q-pa-md flex justify-center" flat>
                      <q-item>
                        <q-item-section avatar>
                          <q-avatar size="60px">
                            <img src="https://cdn.quasar.dev/img/avatar2.jpg" />
                          </q-avatar>
                        </q-item-section>

                        <q-item-section>
                          <q-item-label>شرکت تربت پاک</q-item-label>
                          <q-item-label class="q-pt-sm" caption
                            >501 تا 1000 نفر</q-item-label
                          >
                        </q-item-section>
                      </q-item>
                    </div>
                  </swiper-slide>
                </q-tab>

                <q-tab name="nameFive">
                  <swiper-slide>
                    <div class="q-pa-md flex justify-center" flat>
                      <q-item>
                        <q-item-section avatar>
                          <q-avatar size="60px">
                            <img src="https://cdn.quasar.dev/img/avatar2.jpg" />
                          </q-avatar>
                        </q-item-section>

                        <q-item-section>
                          <q-item-label>شرکت تربت پاک</q-item-label>
                          <q-item-label class="q-pt-sm" caption
                            >501 تا 1000 نفر</q-item-label
                          >
                        </q-item-section>
                      </q-item>
                    </div>
                  </swiper-slide>
                </q-tab>

                <q-tab name="nameSix">
                  <swiper-slide>
                    <div class="q-pa-md flex justify-center" flat>
                      <q-item>
                        <q-item-section avatar>
                          <q-avatar size="60px">
                            <img src="https://cdn.quasar.dev/img/avatar2.jpg" />
                          </q-avatar>
                        </q-item-section>

                        <q-item-section>
                          <q-item-label>شرکت تربت پاک</q-item-label>
                          <q-item-label class="q-pt-sm" caption
                            >501 تا 1000 نفر</q-item-label
                          >
                        </q-item-section>
                      </q-item>
                    </div>
                  </swiper-slide>
                </q-tab>
              </q-tabs>
            </swiper>

            <swiper
              :slidesPerView="1"
              :spaceBetween="30"
              :autoplay="{
                delay: 2500,
                disableOnInteraction: false,
              }"
              class="lt-md"
            >
              <q-tabs
                indicator-color="transparent"
                active-class="active-tab"
                outside-arrows
                mobile-arrows
                model="tab"
              >
                <q-tab name="nameOne">
                  <swiper-slide>
                    <div class="q-pa-md flex justify-center" flat>
                      <q-item>
                        <q-item-section avatar>
                          <q-avatar size="60px">
                            <img src="https://cdn.quasar.dev/img/avatar2.jpg" />
                          </q-avatar>
                        </q-item-section>

                        <q-item-section>
                          <q-item-label>شرکت تربت پاک</q-item-label>
                          <q-item-label class="q-pt-sm" caption
                            >501 تا 1000 نفر</q-item-label
                          >
                        </q-item-section>
                      </q-item>
                    </div>
                  </swiper-slide>
                </q-tab>

                <q-tab name="nameTwo">
                  <swiper-slide>
                    <div class="q-pa-md flex justify-center" flat>
                      <q-item>
                        <q-item-section avatar>
                          <q-avatar size="60px">
                            <img src="https://cdn.quasar.dev/img/avatar2.jpg" />
                          </q-avatar>
                        </q-item-section>

                        <q-item-section>
                          <q-item-label>شرکت تربت پاک</q-item-label>
                          <q-item-label class="q-pt-sm" caption
                            >501 تا 1000 نفر</q-item-label
                          >
                        </q-item-section>
                      </q-item>
                    </div>
                  </swiper-slide>
                </q-tab>

                <q-tab name="nameThree">
                  <swiper-slide>
                    <div class="q-pa-md flex justify-center" flat>
                      <q-item>
                        <q-item-section avatar>
                          <q-avatar size="60px">
                            <img src="https://cdn.quasar.dev/img/avatar2.jpg" />
                          </q-avatar>
                        </q-item-section>

                        <q-item-section>
                          <q-item-label>شرکت تربت پاک</q-item-label>
                          <q-item-label class="q-pt-sm" caption
                            >501 تا 1000 نفر</q-item-label
                          >
                        </q-item-section>
                      </q-item>
                    </div>
                  </swiper-slide>
                </q-tab>

                <q-tab name="nameFour">
                  <swiper-slide>
                    <div class="q-pa-md flex justify-center" flat>
                      <q-item>
                        <q-item-section avatar>
                          <q-avatar size="60px">
                            <img src="https://cdn.quasar.dev/img/avatar2.jpg" />
                          </q-avatar>
                        </q-item-section>

                        <q-item-section>
                          <q-item-label>شرکت تربت پاک</q-item-label>
                          <q-item-label class="q-pt-sm" caption
                            >501 تا 1000 نفر</q-item-label
                          >
                        </q-item-section>
                      </q-item>
                    </div>
                  </swiper-slide>
                </q-tab>

                <q-tab name="nameFive">
                  <swiper-slide>
                    <div class="q-pa-md flex justify-center" flat>
                      <q-item>
                        <q-item-section avatar>
                          <q-avatar size="60px">
                            <img src="https://cdn.quasar.dev/img/avatar2.jpg" />
                          </q-avatar>
                        </q-item-section>

                        <q-item-section>
                          <q-item-label>شرکت تربت پاک</q-item-label>
                          <q-item-label class="q-pt-sm" caption
                            >501 تا 1000 نفر</q-item-label
                          >
                        </q-item-section>
                      </q-item>
                    </div>
                  </swiper-slide>
                </q-tab>

                <q-tab name="nameSix">
                  <swiper-slide>
                    <div class="q-pa-md flex justify-center" flat>
                      <q-item>
                        <q-item-section avatar>
                          <q-avatar size="60px">
                            <img src="https://cdn.quasar.dev/img/avatar2.jpg" />
                          </q-avatar>
                        </q-item-section>

                        <q-item-section>
                          <q-item-label>شرکت تربت پاک</q-item-label>
                          <q-item-label class="q-pt-sm" caption
                            >501 تا 1000 نفر</q-item-label
                          >
                        </q-item-section>
                      </q-item>
                    </div>
                  </swiper-slide>
                </q-tab>
              </q-tabs>
            </swiper>
          </div>

          <!-- Companies Details -->

          <q-tab-panels v-model="tab">
            <q-tab-panel name="nameOne">
              <div class="row q-mt-lg">
                <div class="col-xs-12 col-sm-12 col-md-6 q-px-md">
                  <q-img
                    src="https://jobvision.ir/assets/images/landings/new-year/company/bime_saman.jpg"
                    class="responsive-image"
                  />
                </div>

                <div
                  class="col-xs-12 col-sm-12 col-md-6 row justify-end q-px-md"
                >
                  <!-- Some Details About Company -->

                  <div class="full-width row justify-between">
                    <div
                      class="text-bold col-xs-12 col-sm-12 col-md-5 col-lg-6 q-pb-md q-px-sm"
                      style="font-size: 26px"
                    >
                      شرکت تربت پاک
                    </div>

                    <div
                      class="col-xs-12 col-sm-12 col-md-7 col-lg-6 row items-center q-gutter-y-md q-px-sm"
                    >
                      <div
                        class="col-xs-12 col-sm-12 col-md-6 row q-gutter-x-sm"
                      >
                        <img
                          src="https://jobvision.ir/assets/images/landings/new-year/i-1.svg"
                        />

                        <div class="text-grey-7" style="font-size: 15px">
                          بیمه
                        </div>
                      </div>

                      <div
                        class="col-xs-12 col-sm-12 col-md-6 row q-gutter-x-sm"
                      >
                        <img
                          src="https://jobvision.ir/assets/images/landings/new-year/i-2.svg"
                        />

                        <div class="text-grey-7" style="font-size: 15px">
                          51 تا 200 نفر
                        </div>
                      </div>
                    </div>
                  </div>

                  <!-- Offers And Goodies -->

                  <div class="full-width q-py-md">
                    <div class="full-width row justify-between">
                      <div class="col-5">
                        <div class="row q-my-sm">
                          <q-btn rounded dense color="positive" class="q-mr-sm">
                            <q-icon size="20px" name="done" />
                          </q-btn>

                          <div>صندوق رفاهیات (وام)</div>
                        </div>

                        <div class="row q-my-sm">
                          <q-btn rounded dense color="positive" class="q-mr-sm">
                            <q-icon size="20px" name="done" />
                          </q-btn>

                          <div>پارکینگ اختصاصی</div>
                        </div>

                        <div class="row q-my-sm">
                          <q-btn rounded dense color="positive" class="q-mr-sm">
                            <q-icon size="20px" name="done" />
                          </q-btn>

                          <div>باشگاه ورزشی در محل کار</div>
                        </div>

                        <div class="row q-my-sm">
                          <q-btn rounded dense color="positive" class="q-mr-sm">
                            <q-icon size="20px" name="done" />
                          </q-btn>

                          <div>ساعت کار منعطف</div>
                        </div>

                        <div class="row q-my-sm">
                          <q-btn rounded dense color="positive" class="q-mr-sm">
                            <q-icon size="20px" name="done" />
                          </q-btn>

                          <div>بیمه تکمیل درمان</div>
                        </div>

                        <div class="row q-my-sm">
                          <q-btn rounded dense color="positive" class="q-mr-sm">
                            <q-icon size="20px" name="done" />
                          </q-btn>

                          <div>هدایای مناسبتی</div>
                        </div>
                      </div>

                      <div class="col-5">
                        <div class="row q-my-sm">
                          <q-btn rounded dense color="positive" class="q-mr-sm">
                            <q-icon size="20px" name="done" />
                          </q-btn>

                          <div>حقوق و مزایای رقابتی</div>
                        </div>

                        <div class="row q-my-sm">
                          <q-btn rounded dense color="positive" class="q-mr-sm">
                            <q-icon size="20px" name="done" />
                          </q-btn>

                          <div>کمک هزینه آموزش</div>
                        </div>

                        <div class="row q-my-sm">
                          <q-btn rounded dense color="positive" class="q-mr-sm">
                            <q-icon size="20px" name="done" />
                          </q-btn>

                          <div>میان وعده</div>
                        </div>

                        <div class="row q-my-sm">
                          <q-btn rounded dense color="positive" class="q-mr-sm">
                            <q-icon size="20px" name="done" />
                          </q-btn>

                          <div>اقامتگاه تفریحی (بزودی)</div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div :class="dynamicPositioning">
                    <q-btn
                      outline
                      color="primary"
                      label="مشاهده صفحه شرکت"
                      icon-right="arrow_back_ios"
                      to="/company"
                    />
                  </div>
                </div>
              </div>
            </q-tab-panel>
          </q-tab-panels>
        </div>
      </div>
    </div>
  </q-page>
</template>

<script>
import { ref } from "vue";

export default {
  computed: {
    dynamicFont() {
      return {
        "font-11": this.$q.screen.xs,
        "text-grey-9 text-weight-thin q-py-md q-px-md": true,
      };
    },
    dynamicHeaderFont() {
      return {
        fontSize: this.$q.screen.xs ? "19px" : "25px",
      };
    },
    dynamicMediumFont() {
      return {
        fontSize: this.$q.screen.xs ? "14px" : "21px",
      };
    },
    dynamicSmallFont() {
      return {
        fontSize: this.$q.screen.xs ? "12px" : "16px",
      };
    },
    dynamicXSFont() {
      return {
        fontSize: this.$q.screen.xs ? "11px" : "14px",
      };
    },
    bestCompaniestListTexts() {
      return {
        "text-grey-8": true,
        "font-12": this.$q.screen.xs,
      };
    },
    dynamicContainerPadding() {
      return {
        "col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-7 flex ": true,
        "q-pl-lg": this.$q.screen.xs,
        "q-pl-xl": this.$q.screen.sm,
        "q-gutter-y-md": this.$q.screen.xs,
      };
    },
    dynamicBackground() {
      return {
        borderRadius: "0 0 10px 10px",
        backgroundColor: this.$q.screen.gt.xs ? "#fff" : "transparent",
        boxShadow: this.$q.screen.gt.xs
          ? "0 1px 2px #0000000d, 0 1px 30px #00000008"
          : "none",
      };
    },
    dynamicSpaceing() {
      return {
        "text-bold text-h6 text-grey-8 ": true,
        "q-pb-lg": this.$q.screen.xs,
        "q-my-xl": this.$q.screen.gt.xs,
      };
    },
    dynamicPositioning() {
      return {
        "full-width flex": true,
        "justify-center": this.$q.screen.xs,
        "justify-end": this.$q.screen.gt.xs,
      };
    },
  },

  setup() {
    const items = ref(new Array(6).fill(null));

    return {
      tab: ref("nameOne"),
      items,
      slide: ref(1),
    };
  },
};
</script>

<style scoped>
.q-item {
  padding: 0;
}

.q-tab__label {
  font-size: 12px;
  line-height: 1.715em;
  font-weight: 500;
}

.q-tab-panels {
  background-color: transparent;
}

.q-tab-panel {
  padding: 0;
}

.active-tab {
  border-radius: 13px;
  border-bottom: 7px solid #5660f2;
  background-color: white;
}

.responsive-image {
  border-radius: 5px;
  height: 70%;
}

@media (max-width: 1023px) {
  .responsive-image {
    height: 90%;
  }
}
</style>
