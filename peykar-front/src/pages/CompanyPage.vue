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
              <div
                class="q-px-sm bg-white"
                style="
                  border-top-right-radius: 10px;
                  border-top-left-radius: 10px;
                "
              >
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

              <q-tab-panels v-model="tab" animated>
                <!-- About Company -->

                <q-tab-panel class="row" name="about">
                  <div class="col-12 row br-10">
                    <!-- Core Information -->

                    <div class="col-12 bg-white q-pl-md">
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

                    <div
                      class="col-12 bg-white q-pl-md"
                      style="font-size: 16px"
                    >
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

                    <div class="col-12 bg-white q-pl-md q-py-md q-pt-lg">
                      <div class="text-bold text-h6">معرفی تصویری سازمان</div>

                      <div class="col-12 row q-my-md q-ml-md">
                        <q-carousel
                          class="col-8"
                          style="height: 250px"
                          swipeable
                          animated
                          v-model="slide"
                          autoplay
                          ref="carousel"
                          infinite
                          thumbnails
                        >
                          <q-carousel-slide
                            :name="1"
                            img-src="https://fileapi.jobvision.ir/api/v1.0/files/getimage?fileid=1057995&width=450&height=250"
                          />
                          <q-carousel-slide
                            :name="2"
                            img-src="https://fileapi.jobvision.ir/api/v1.0/files/getimage?fileid=1057996&width=450&height=250"
                          />
                          <q-carousel-slide
                            :name="3"
                            img-src="https://fileapi.jobvision.ir/api/v1.0/files/getimage?fileid=1057997&width=450&height=250"
                          />
                          <q-carousel-slide
                            :name="4"
                            img-src="https://fileapi.jobvision.ir/api/v1.0/files/getimage?fileid=1057998&width=450&height=250"
                          />

                          <template v-slot:control>
                            <q-carousel-control
                              class="full-width flex justify-between content-center"
                              style="height: 200px"
                            >
                              <div>
                                <q-btn
                                  flat
                                  round
                                  dense
                                  color="grey-6"
                                  icon="arrow_forward_ios"
                                  @click="$refs.carousel.next()"
                                />
                              </div>

                              <div>
                                <q-btn
                                  flat
                                  round
                                  dense
                                  color="grey-6"
                                  icon="arrow_back_ios"
                                  @click="$refs.carousel.previous()"
                                />
                              </div>
                            </q-carousel-control>
                          </template>
                        </q-carousel>
                      </div>
                    </div>

                    <!-- About Company -->

                    <div class="col-12 bg-white q-pl-md br-10 q-pb-md">
                      <div class="text-bold text-h6">درباره ما</div>

                      <div class="q-my-md">
                        <q-expansion-item
                          hide-expand-icon
                          v-model="expanded"
                          label="شرکت تربت پاک در سال 1368به صورت رسمی فعالیت خود را به عنوان پیمانکار پروژه های ساختمانی، تأسیساتی و راهسازی کشور آغاز نمود"
                        >
                          <div>
                            و تا امروز در این عرصه حضوری جدی و مستمر دارد، شرکت
                            تربت پاک با به کارگیری نیروی انسانی متخصص و جوان و
                            همچنین طراحی و پیاده سازی سیستم های نوین مدیریتی از
                            جمله سیستم طراحی و مهندسی مدرن در مدلسازی اطلاعات
                            ساختمان (BIM)، سیستم مدیریت فرآیندهای کسب و
                            کار(BPMS)، ایجاد دفتر مدیریت پروژه (PMO)، سیستم
                            مدیریت HSE مبتنی بر فرهنگ سازمانی و قوانین و
                            استانداردهای مربوطه، ، سیستم حسابداری منفرد و دفتر
                            آتلیه تخصصی معماری، توانسته است ضمن اخذ استانداردهای
                            مختلف بین المللی، پروژه هایی متفاوت C، PC،EPC و EPCF
                            را با رویکردهای متفاوت قراردادی پیمانکاری، مشارکت و
                            سرمایه گذاری با موفقیت به اتمام رسانده و نقش مهمی در
                            پیشرفت و عمرانی کشور داشته باشد. شرکت از ابتدای سال
                            1395 با درک شرایط اقتصادی حاکم بر کشور و تحلیل بازار
                            صنعت ساختمان، با تدوین استراتژی جدید و اصلاح برنامه
                            های کوتاه مدت و بلند مدت، توانست توسعه کمی و کیفی
                            فعالیت های خود در قالب قراردادهای طراحی، تدارکات،
                            اجرا و سرمایه گذاری درکلیه پروژه ها ادامه داده و به
                            منظور توسعه فعالیتهای خود، در سال 1400 با تأسیس گروه
                            معدنی تربت پاک پارس با رویکرد اکتشاف، استخراج و بهره
                            برداری در معادن فلزی و غیر فلزی ایران و همچنین شروع
                            فعالیت در پروژه های نفت و گاز در همین سال با چشم
                            انداز نگهداری و بهره برداری از پروژه های خود و پروژه
                            های خاص در سال آینده، برنامه ریزی های مدونی انجام
                            دهد. سرمایه واقعی این شرکت نیروی انسانی با دانش و
                            متعهد و همچنین جلب اعتماد مردم در سرمایه گذاری می
                            باشد که توانسته است با پشتیبانی و حمایت از واحد
                            تحقیق و توسعه و نوآوری در طراحی و اجرا، در تمام عرصه
                            ها موفقیت قابل توجهی کسب نماید، شرکت تربت پاک تلاش
                            می کند تمام پروژه های در دست اجرای خود را با
                            بالاترین کیفیت ممکن اجرا کند و همواره ارزش افزوده
                            بیشتری برای کارفرمایان، شرکاء تجاری و دیگر ذینفعان
                            ایجاد نماید، مفتخریم که هم اکنون 1000 نفر بطور
                            مستقیم در این شرکت مشغول به فعالیت می¬باشند.
                          </div>

                          <div class="q-mt-xl">
                            <div class="text-bold text-h6">محصولات و خدمات</div>

                            <div class="q-mt-lg">
                              <div>
                                سرمایه گذار و پیمانکار عمومی انواع پروژه های
                              </div>
                              <div>
                                ساختمان، انبوه سازی، راهسازی، جاده سازی ، نفت،
                                گاز و معادن در تمامی نقاط ایران
                              </div>
                            </div>
                          </div>
                        </q-expansion-item>

                        <div class="text-center">
                          <q-btn
                            flat
                            color="primary"
                            label="توضیحات بیشتر"
                            icon-right="expand_more"
                            class="q-mb-md"
                            @click="toggleItem"
                          />
                        </div>
                      </div>
                    </div>

                    <div
                      style="background-color: #f8f9fa"
                      class="text-bold text-h5 q-my-lg q-pl-md"
                    >
                      فرصت‌های شغلی
                    </div>

                    <!-- Opportunities -->

                    <div class="col-12">
                      <div class="row justify-between">
                        <div class="col-6 q-pr-sm">
                          <q-list
                            class="full-width bg-white br-10 q-my-sm"
                            bordered
                            separator
                          >
                            <div class="q-px-md">
                              <q-item class="col-12 q-my-xs">
                                <q-item-section class="q-pa-md" avatar>
                                  <div class="row">
                                    <q-badge
                                      class="q-my-xs q-mx-xs"
                                      color="red-1"
                                      text-color="negative"
                                      label="فوری"
                                    />
                                  </div>

                                  <q-avatar>
                                    <img
                                      src="https://fileapi.jobvision.ir/api/v1.0/files/getimage?fileid=153717&width=71&height=71"
                                    />
                                  </q-avatar>
                                </q-item-section>

                                <q-item-section caption class="q-pa-md">
                                  <q-item-label class="text-weight-bold"
                                    >کارشناس اداری و منابع انسانی</q-item-label
                                  >

                                  <q-item-label
                                    class="text-weight-thin q-pt-xs"
                                  >
                                    تربت پاک
                                  </q-item-label>

                                  <q-item-label caption>
                                    تهران، ظفر
                                    <span class="text-grey-5"> | </span>

                                    <span class="text-positive"
                                      >10 - 12 میلیون تومان
                                    </span>
                                  </q-item-label>
                                </q-item-section>

                                <q-item-section class="q-pa-md" side top>
                                  <q-btn flat icon="favorite_outline" />
                                </q-item-section>
                              </q-item>

                              <div class="q-pr-lg">
                                <q-separator style="height: 1px" />
                              </div>

                              <div class="col-12 q-my-sm">
                                <div class="row justify-center">
                                  <div
                                    class="full-width row justify-between items-center"
                                  >
                                    <div class="col-3 text-grey-5">
                                      12 روز پیش
                                    </div>

                                    <div class="col-4 row justify-end">
                                      <q-btn
                                        icon-right="arrow_back"
                                        flat
                                        color="primary"
                                        label="مشاهده"
                                      />
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </q-list>
                        </div>

                        <div class="col-6 q-pl-sm">
                          <q-list
                            class="full-width bg-white br-10 q-my-sm"
                            bordered
                            separator
                          >
                            <div class="q-px-md">
                              <q-item class="col-12 q-my-xs">
                                <q-item-section class="q-pa-md" avatar>
                                  <q-avatar>
                                    <img
                                      src="https://fileapi.jobvision.ir/api/v1.0/files/getimage?fileid=153717&width=71&height=71"
                                    />
                                  </q-avatar>
                                </q-item-section>

                                <q-item-section caption class="q-pa-md">
                                  <q-item-label class="text-weight-bold"
                                    >کارشناس اداری و منابع انسانی</q-item-label
                                  >

                                  <q-item-label
                                    class="text-weight-thin q-pt-xs"
                                  >
                                    تربت پاک
                                  </q-item-label>

                                  <q-item-label caption>
                                    تهران، ظفر
                                    <span class="text-grey-5"> | </span>

                                    <span class="text-positive"
                                      >10 - 12 میلیون تومان
                                    </span>
                                  </q-item-label>
                                </q-item-section>

                                <q-item-section class="q-pa-md" side top>
                                  <q-btn flat icon="favorite_outline" />
                                </q-item-section>
                              </q-item>

                              <div class="q-pr-lg">
                                <q-separator style="height: 1px" />
                              </div>

                              <div class="col-12 q-my-sm">
                                <div class="row justify-center">
                                  <div
                                    class="full-width row justify-between items-center"
                                  >
                                    <div class="col-3 text-grey-5">
                                      12 روز پیش
                                    </div>

                                    <div class="col-4 row justify-end">
                                      <q-btn
                                        icon-right="arrow_back"
                                        flat
                                        color="primary"
                                        label="مشاهده"
                                      />
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </q-list>
                        </div>

                        <div class="col-6 q-pr-sm">
                          <q-list
                            class="full-width bg-white br-10 q-my-sm relative-position"
                            bordered
                            separator
                          >
                            <q-btn
                              class="absolute-center text-bold"
                              outline
                              color="red"
                              label="بسته شده"
                              disable
                              style="rotate: 344deg"
                            />

                            <div class="q-px-md closed-job">
                              <q-item class="col-12 q-my-xs">
                                <q-item-section class="q-pa-md" avatar>
                                  <q-avatar>
                                    <img
                                      src="https://fileapi.jobvision.ir/api/v1.0/files/getimage?fileid=153717&width=71&height=71"
                                    />
                                  </q-avatar>
                                </q-item-section>

                                <q-item-section caption class="q-pa-md">
                                  <q-item-label class="text-weight-bold"
                                    >کارشناس اداری و منابع انسانی</q-item-label
                                  >

                                  <q-item-label
                                    class="text-weight-thin q-pt-xs"
                                  >
                                    تربت پاک
                                  </q-item-label>

                                  <q-item-label caption>
                                    تهران، ظفر
                                    <span class="text-grey-5"> | </span>

                                    <span class="text-positive"
                                      >10 - 12 میلیون تومان
                                    </span>
                                  </q-item-label>
                                </q-item-section>

                                <q-item-section class="q-pa-md" side top>
                                  <q-btn flat icon="favorite_outline" />
                                </q-item-section>
                              </q-item>

                              <div class="q-pr-lg">
                                <q-separator style="height: 1px" />
                              </div>

                              <div class="col-12 q-my-sm">
                                <div class="row justify-center">
                                  <div
                                    class="full-width row justify-between items-center"
                                  >
                                    <div class="col-3 text-grey-5">
                                      12 روز پیش
                                    </div>

                                    <div class="col-4 row justify-end">
                                      <q-btn
                                        icon-right="arrow_back"
                                        flat
                                        color="primary"
                                        label="مشاهده"
                                      />
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </q-list>
                        </div>

                        <div class="col-6 q-pl-sm">
                          <q-list
                            class="full-width bg-white br-10 q-my-sm relative-position"
                            bordered
                            separator
                          >
                            <q-btn
                              class="absolute-center text-bold"
                              outline
                              color="red"
                              label="بسته شده"
                              disable
                              style="rotate: 344deg"
                            />

                            <div class="q-px-md closed-job">
                              <q-item class="col-12 q-my-xs">
                                <q-item-section class="q-pa-md" avatar>
                                  <div class="row">
                                    <q-badge
                                      class="q-my-xs q-mx-xs"
                                      color="red-1"
                                      text-color="negative"
                                      label="فوری"
                                    />
                                  </div>

                                  <q-avatar>
                                    <img
                                      src="https://fileapi.jobvision.ir/api/v1.0/files/getimage?fileid=153717&width=71&height=71"
                                    />
                                  </q-avatar>
                                </q-item-section>

                                <q-item-section caption class="q-pa-md">
                                  <q-item-label class="text-weight-bold"
                                    >کارشناس اداری و منابع انسانی</q-item-label
                                  >

                                  <q-item-label
                                    class="text-weight-thin q-pt-xs"
                                  >
                                    تربت پاک
                                  </q-item-label>

                                  <q-item-label caption>
                                    تهران، ظفر
                                  </q-item-label>
                                </q-item-section>

                                <q-item-section class="q-pa-md" side top>
                                  <q-btn flat icon="favorite_outline" />
                                </q-item-section>
                              </q-item>

                              <div class="q-pr-lg">
                                <q-separator style="height: 1px" />
                              </div>

                              <div class="col-12 q-my-sm">
                                <div class="row justify-center">
                                  <div
                                    class="full-width row justify-between items-center"
                                  >
                                    <div class="col-3 text-grey-5">
                                      12 روز پیش
                                    </div>

                                    <div class="col-4 row justify-end">
                                      <q-btn
                                        icon-right="arrow_back"
                                        flat
                                        color="primary"
                                        label="مشاهده"
                                      />
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </q-list>
                        </div>
                      </div>
                    </div>
                  </div>
                </q-tab-panel>

                <!-- Opportunities On Company -->

                <q-tab-panel name="opportunity">
                  <div class="row br-10 bg-white q-pa-md">
                    <div class="col-12">
                      <div class="row justify-between">
                        <div class="col-6 q-pr-sm">
                          <q-list
                            class="full-width bg-white br-10 q-my-sm"
                            bordered
                            separator
                          >
                            <div class="q-px-md">
                              <q-item class="col-12 q-my-xs">
                                <q-item-section class="q-pa-md" avatar>
                                  <div class="row">
                                    <q-badge
                                      class="q-my-xs q-mx-xs"
                                      color="red-1"
                                      text-color="negative"
                                      label="فوری"
                                    />
                                  </div>

                                  <q-avatar>
                                    <img
                                      src="https://fileapi.jobvision.ir/api/v1.0/files/getimage?fileid=153717&width=71&height=71"
                                    />
                                  </q-avatar>
                                </q-item-section>

                                <q-item-section caption class="q-pa-md">
                                  <q-item-label class="text-weight-bold"
                                    >کارشناس اداری و منابع انسانی</q-item-label
                                  >

                                  <q-item-label
                                    class="text-weight-thin q-pt-xs"
                                  >
                                    تربت پاک
                                  </q-item-label>

                                  <q-item-label caption>
                                    تهران، ظفر
                                    <span class="text-grey-5"> | </span>

                                    <span class="text-positive"
                                      >10 - 12 میلیون تومان
                                    </span>
                                  </q-item-label>
                                </q-item-section>

                                <q-item-section class="q-pa-md" side top>
                                  <q-btn flat icon="favorite_outline" />
                                </q-item-section>
                              </q-item>

                              <div class="q-pr-lg">
                                <q-separator style="height: 1px" />
                              </div>

                              <div class="col-12 q-my-sm">
                                <div class="row justify-center">
                                  <div
                                    class="full-width row justify-between items-center"
                                  >
                                    <div class="col-3 text-grey-5">
                                      12 روز پیش
                                    </div>

                                    <div class="col-4 row justify-end">
                                      <q-btn
                                        icon-right="arrow_back"
                                        flat
                                        color="primary"
                                        label="مشاهده"
                                      />
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </q-list>
                        </div>

                        <div class="col-6 q-pl-sm">
                          <q-list
                            class="full-width bg-white br-10 q-my-sm"
                            bordered
                            separator
                          >
                            <div class="q-px-md">
                              <q-item class="col-12 q-my-xs">
                                <q-item-section class="q-pa-md" avatar>
                                  <q-avatar>
                                    <img
                                      src="https://fileapi.jobvision.ir/api/v1.0/files/getimage?fileid=153717&width=71&height=71"
                                    />
                                  </q-avatar>
                                </q-item-section>

                                <q-item-section caption class="q-pa-md">
                                  <q-item-label class="text-weight-bold"
                                    >کارشناس اداری و منابع انسانی</q-item-label
                                  >

                                  <q-item-label
                                    class="text-weight-thin q-pt-xs"
                                  >
                                    تربت پاک
                                  </q-item-label>

                                  <q-item-label caption>
                                    تهران، ظفر
                                    <span class="text-grey-5"> | </span>

                                    <span class="text-positive"
                                      >10 - 12 میلیون تومان
                                    </span>
                                  </q-item-label>
                                </q-item-section>

                                <q-item-section class="q-pa-md" side top>
                                  <q-btn flat icon="favorite_outline" />
                                </q-item-section>
                              </q-item>

                              <div class="q-pr-lg">
                                <q-separator style="height: 1px" />
                              </div>

                              <div class="col-12 q-my-sm">
                                <div class="row justify-center">
                                  <div
                                    class="full-width row justify-between items-center"
                                  >
                                    <div class="col-3 text-grey-5">
                                      12 روز پیش
                                    </div>

                                    <div class="col-4 row justify-end">
                                      <q-btn
                                        icon-right="arrow_back"
                                        flat
                                        color="primary"
                                        label="مشاهده"
                                      />
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </q-list>
                        </div>

                        <div class="col-6 q-pr-sm">
                          <q-list
                            class="full-width bg-white br-10 q-my-sm"
                            bordered
                            separator
                          >
                            <div class="q-px-md">
                              <q-item class="col-12 q-my-xs">
                                <q-item-section class="q-pa-md" avatar>
                                  <div class="row">
                                    <q-badge
                                      class="q-my-xs q-mx-xs"
                                      color="red-1"
                                      text-color="negative"
                                      label="فوری"
                                    />
                                  </div>

                                  <q-avatar>
                                    <img
                                      src="https://fileapi.jobvision.ir/api/v1.0/files/getimage?fileid=153717&width=71&height=71"
                                    />
                                  </q-avatar>
                                </q-item-section>

                                <q-item-section caption class="q-pa-md">
                                  <q-item-label class="text-weight-bold"
                                    >کارشناس اداری و منابع انسانی</q-item-label
                                  >

                                  <q-item-label
                                    class="text-weight-thin q-pt-xs"
                                  >
                                    تربت پاک
                                  </q-item-label>

                                  <q-item-label caption>
                                    تهران، ظفر
                                    <span class="text-grey-5"> | </span>

                                    <span class="text-positive"
                                      >10 - 12 میلیون تومان
                                    </span>
                                  </q-item-label>
                                </q-item-section>

                                <q-item-section class="q-pa-md" side top>
                                  <q-btn flat icon="favorite_outline" />
                                </q-item-section>
                              </q-item>

                              <div class="q-pr-lg">
                                <q-separator style="height: 1px" />
                              </div>

                              <div class="col-12 q-my-sm">
                                <div class="row justify-center">
                                  <div
                                    class="full-width row justify-between items-center"
                                  >
                                    <div class="col-3 text-grey-5">
                                      12 روز پیش
                                    </div>

                                    <div class="col-4 row justify-end">
                                      <q-btn
                                        icon-right="arrow_back"
                                        flat
                                        color="primary"
                                        label="مشاهده"
                                      />
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </q-list>
                        </div>

                        <div class="col-6 q-pl-sm">
                          <q-list
                            class="full-width bg-white br-10 q-my-sm"
                            bordered
                            separator
                          >
                            <div class="q-px-md">
                              <q-item class="col-12 q-my-xs">
                                <q-item-section class="q-pa-md" avatar>
                                  <q-avatar>
                                    <img
                                      src="https://fileapi.jobvision.ir/api/v1.0/files/getimage?fileid=153717&width=71&height=71"
                                    />
                                  </q-avatar>
                                </q-item-section>

                                <q-item-section caption class="q-pa-md">
                                  <q-item-label class="text-weight-bold"
                                    >کارشناس اداری و منابع انسانی</q-item-label
                                  >

                                  <q-item-label
                                    class="text-weight-thin q-pt-xs"
                                  >
                                    تربت پاک
                                  </q-item-label>

                                  <q-item-label caption>
                                    تهران، ظفر
                                    <span class="text-grey-5"> | </span>

                                    <span class="text-positive"
                                      >10 - 12 میلیون تومان
                                    </span>
                                  </q-item-label>
                                </q-item-section>

                                <q-item-section class="q-pa-md" side top>
                                  <q-btn flat icon="favorite_outline" />
                                </q-item-section>
                              </q-item>

                              <div class="q-pr-lg">
                                <q-separator style="height: 1px" />
                              </div>

                              <div class="col-12 q-my-sm">
                                <div class="row justify-center">
                                  <div
                                    class="full-width row justify-between items-center"
                                  >
                                    <div class="col-3 text-grey-5">
                                      12 روز پیش
                                    </div>

                                    <div class="col-4 row justify-end">
                                      <q-btn
                                        icon-right="arrow_back"
                                        flat
                                        color="primary"
                                        label="مشاهده"
                                      />
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </q-list>
                        </div>

                        <div class="col-6 q-pr-sm">
                          <q-list
                            class="full-width bg-white br-10 q-my-sm"
                            bordered
                            separator
                          >
                            <div class="q-px-md">
                              <q-item class="col-12 q-my-xs">
                                <q-item-section class="q-pa-md" avatar>
                                  <div class="row">
                                    <q-badge
                                      class="q-my-xs q-mx-xs"
                                      color="red-1"
                                      text-color="negative"
                                      label="فوری"
                                    />
                                  </div>

                                  <q-avatar>
                                    <img
                                      src="https://fileapi.jobvision.ir/api/v1.0/files/getimage?fileid=153717&width=71&height=71"
                                    />
                                  </q-avatar>
                                </q-item-section>

                                <q-item-section caption class="q-pa-md">
                                  <q-item-label class="text-weight-bold"
                                    >کارشناس اداری و منابع انسانی</q-item-label
                                  >

                                  <q-item-label
                                    class="text-weight-thin q-pt-xs"
                                  >
                                    تربت پاک
                                  </q-item-label>

                                  <q-item-label caption>
                                    تهران، ظفر
                                    <span class="text-grey-5"> | </span>

                                    <span class="text-positive"
                                      >10 - 12 میلیون تومان
                                    </span>
                                  </q-item-label>
                                </q-item-section>

                                <q-item-section class="q-pa-md" side top>
                                  <q-btn flat icon="favorite_outline" />
                                </q-item-section>
                              </q-item>

                              <div class="q-pr-lg">
                                <q-separator style="height: 1px" />
                              </div>

                              <div class="col-12 q-my-sm">
                                <div class="row justify-center">
                                  <div
                                    class="full-width row justify-between items-center"
                                  >
                                    <div class="col-3 text-grey-5">
                                      12 روز پیش
                                    </div>

                                    <div class="col-4 row justify-end">
                                      <q-btn
                                        icon-right="arrow_back"
                                        flat
                                        color="primary"
                                        label="مشاهده"
                                      />
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </q-list>
                        </div>

                        <div class="col-6 q-pl-sm">
                          <q-list
                            class="full-width bg-white br-10 q-my-sm"
                            bordered
                            separator
                          >
                            <div class="q-px-md">
                              <q-item class="col-12 q-my-xs">
                                <q-item-section class="q-pa-md" avatar>
                                  <q-avatar>
                                    <img
                                      src="https://fileapi.jobvision.ir/api/v1.0/files/getimage?fileid=153717&width=71&height=71"
                                    />
                                  </q-avatar>
                                </q-item-section>

                                <q-item-section caption class="q-pa-md">
                                  <q-item-label class="text-weight-bold"
                                    >کارشناس اداری و منابع انسانی</q-item-label
                                  >

                                  <q-item-label
                                    class="text-weight-thin q-pt-xs"
                                  >
                                    تربت پاک
                                  </q-item-label>

                                  <q-item-label caption>
                                    تهران، ظفر
                                    <span class="text-grey-5"> | </span>

                                    <span class="text-positive"
                                      >10 - 12 میلیون تومان
                                    </span>
                                  </q-item-label>
                                </q-item-section>

                                <q-item-section class="q-pa-md" side top>
                                  <q-btn flat icon="favorite_outline" />
                                </q-item-section>
                              </q-item>

                              <div class="q-pr-lg">
                                <q-separator style="height: 1px" />
                              </div>

                              <div class="col-12 q-my-sm">
                                <div class="row justify-center">
                                  <div
                                    class="full-width row justify-between items-center"
                                  >
                                    <div class="col-3 text-grey-5">
                                      12 روز پیش
                                    </div>

                                    <div class="col-4 row justify-end">
                                      <q-btn
                                        icon-right="arrow_back"
                                        flat
                                        color="primary"
                                        label="مشاهده"
                                      />
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </q-list>
                        </div>

                        <div class="col-6 q-pr-sm">
                          <q-list
                            class="full-width bg-white br-10 q-my-sm"
                            bordered
                            separator
                          >
                            <div class="q-px-md">
                              <q-item class="col-12 q-my-xs">
                                <q-item-section class="q-pa-md" avatar>
                                  <div class="row">
                                    <q-badge
                                      class="q-my-xs q-mx-xs"
                                      color="red-1"
                                      text-color="negative"
                                      label="فوری"
                                    />
                                  </div>

                                  <q-avatar>
                                    <img
                                      src="https://fileapi.jobvision.ir/api/v1.0/files/getimage?fileid=153717&width=71&height=71"
                                    />
                                  </q-avatar>
                                </q-item-section>

                                <q-item-section caption class="q-pa-md">
                                  <q-item-label class="text-weight-bold"
                                    >کارشناس اداری و منابع انسانی</q-item-label
                                  >

                                  <q-item-label
                                    class="text-weight-thin q-pt-xs"
                                  >
                                    تربت پاک
                                  </q-item-label>

                                  <q-item-label caption>
                                    تهران، ظفر
                                    <span class="text-grey-5"> | </span>

                                    <span class="text-positive"
                                      >10 - 12 میلیون تومان
                                    </span>
                                  </q-item-label>
                                </q-item-section>

                                <q-item-section class="q-pa-md" side top>
                                  <q-btn flat icon="favorite_outline" />
                                </q-item-section>
                              </q-item>

                              <div class="q-pr-lg">
                                <q-separator style="height: 1px" />
                              </div>

                              <div class="col-12 q-my-sm">
                                <div class="row justify-center">
                                  <div
                                    class="full-width row justify-between items-center"
                                  >
                                    <div class="col-3 text-grey-5">
                                      12 روز پیش
                                    </div>

                                    <div class="col-4 row justify-end">
                                      <q-btn
                                        icon-right="arrow_back"
                                        flat
                                        color="primary"
                                        label="مشاهده"
                                      />
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </q-list>
                        </div>

                        <div class="col-6 q-pl-sm">
                          <q-list
                            class="full-width bg-white br-10 q-my-sm"
                            bordered
                            separator
                          >
                            <div class="q-px-md">
                              <q-item class="col-12 q-my-xs">
                                <q-item-section class="q-pa-md" avatar>
                                  <q-avatar>
                                    <img
                                      src="https://fileapi.jobvision.ir/api/v1.0/files/getimage?fileid=153717&width=71&height=71"
                                    />
                                  </q-avatar>
                                </q-item-section>

                                <q-item-section caption class="q-pa-md">
                                  <q-item-label class="text-weight-bold"
                                    >کارشناس اداری و منابع انسانی</q-item-label
                                  >

                                  <q-item-label
                                    class="text-weight-thin q-pt-xs"
                                  >
                                    تربت پاک
                                  </q-item-label>

                                  <q-item-label caption>
                                    تهران، ظفر
                                    <span class="text-grey-5"> | </span>

                                    <span class="text-positive"
                                      >10 - 12 میلیون تومان
                                    </span>
                                  </q-item-label>
                                </q-item-section>

                                <q-item-section class="q-pa-md" side top>
                                  <q-btn flat icon="favorite_outline" />
                                </q-item-section>
                              </q-item>

                              <div class="q-pr-lg">
                                <q-separator style="height: 1px" />
                              </div>

                              <div class="col-12 q-my-sm">
                                <div class="row justify-center">
                                  <div
                                    class="full-width row justify-between items-center"
                                  >
                                    <div class="col-3 text-grey-5">
                                      12 روز پیش
                                    </div>

                                    <div class="col-4 row justify-end">
                                      <q-btn
                                        icon-right="arrow_back"
                                        flat
                                        color="primary"
                                        label="مشاهده"
                                      />
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </q-list>
                        </div>

                        <div class="col-6 q-pr-sm">
                          <q-list
                            class="full-width bg-white br-10 q-my-sm"
                            bordered
                            separator
                          >
                            <div class="q-px-md">
                              <q-item class="col-12 q-my-xs">
                                <q-item-section class="q-pa-md" avatar>
                                  <div class="row">
                                    <q-badge
                                      class="q-my-xs q-mx-xs"
                                      color="red-1"
                                      text-color="negative"
                                      label="فوری"
                                    />
                                  </div>

                                  <q-avatar>
                                    <img
                                      src="https://fileapi.jobvision.ir/api/v1.0/files/getimage?fileid=153717&width=71&height=71"
                                    />
                                  </q-avatar>
                                </q-item-section>

                                <q-item-section caption class="q-pa-md">
                                  <q-item-label class="text-weight-bold"
                                    >کارشناس اداری و منابع انسانی</q-item-label
                                  >

                                  <q-item-label
                                    class="text-weight-thin q-pt-xs"
                                  >
                                    تربت پاک
                                  </q-item-label>

                                  <q-item-label caption>
                                    تهران، ظفر
                                    <span class="text-grey-5"> | </span>

                                    <span class="text-positive"
                                      >10 - 12 میلیون تومان
                                    </span>
                                  </q-item-label>
                                </q-item-section>

                                <q-item-section class="q-pa-md" side top>
                                  <q-btn flat icon="favorite_outline" />
                                </q-item-section>
                              </q-item>

                              <div class="q-pr-lg">
                                <q-separator style="height: 1px" />
                              </div>

                              <div class="col-12 q-my-sm">
                                <div class="row justify-center">
                                  <div
                                    class="full-width row justify-between items-center"
                                  >
                                    <div class="col-3 text-grey-5">
                                      12 روز پیش
                                    </div>

                                    <div class="col-4 row justify-end">
                                      <q-btn
                                        icon-right="arrow_back"
                                        flat
                                        color="primary"
                                        label="مشاهده"
                                      />
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </q-list>
                        </div>

                        <div class="col-6 q-pl-sm">
                          <q-list
                            class="full-width bg-white br-10 q-my-sm"
                            bordered
                            separator
                          >
                            <div class="q-px-md">
                              <q-item class="col-12 q-my-xs">
                                <q-item-section class="q-pa-md" avatar>
                                  <q-avatar>
                                    <img
                                      src="https://fileapi.jobvision.ir/api/v1.0/files/getimage?fileid=153717&width=71&height=71"
                                    />
                                  </q-avatar>
                                </q-item-section>

                                <q-item-section caption class="q-pa-md">
                                  <q-item-label class="text-weight-bold"
                                    >کارشناس اداری و منابع انسانی</q-item-label
                                  >

                                  <q-item-label
                                    class="text-weight-thin q-pt-xs"
                                  >
                                    تربت پاک
                                  </q-item-label>

                                  <q-item-label caption>
                                    تهران، ظفر
                                    <span class="text-grey-5"> | </span>

                                    <span class="text-positive"
                                      >10 - 12 میلیون تومان
                                    </span>
                                  </q-item-label>
                                </q-item-section>

                                <q-item-section class="q-pa-md" side top>
                                  <q-btn flat icon="favorite_outline" />
                                </q-item-section>
                              </q-item>

                              <div class="q-pr-lg">
                                <q-separator style="height: 1px" />
                              </div>

                              <div class="col-12 q-my-sm">
                                <div class="row justify-center">
                                  <div
                                    class="full-width row justify-between items-center"
                                  >
                                    <div class="col-3 text-grey-5">
                                      12 روز پیش
                                    </div>

                                    <div class="col-4 row justify-end">
                                      <q-btn
                                        icon-right="arrow_back"
                                        flat
                                        color="primary"
                                        label="مشاهده"
                                      />
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </q-list>
                        </div>

                        <div class="col-6 q-pr-sm">
                          <q-list
                            class="full-width bg-white br-10 q-my-sm"
                            bordered
                            separator
                          >
                            <div class="q-px-md">
                              <q-item class="col-12 q-my-xs">
                                <q-item-section class="q-pa-md" avatar>
                                  <div class="row">
                                    <q-badge
                                      class="q-my-xs q-mx-xs"
                                      color="red-1"
                                      text-color="negative"
                                      label="فوری"
                                    />
                                  </div>

                                  <q-avatar>
                                    <img
                                      src="https://fileapi.jobvision.ir/api/v1.0/files/getimage?fileid=153717&width=71&height=71"
                                    />
                                  </q-avatar>
                                </q-item-section>

                                <q-item-section caption class="q-pa-md">
                                  <q-item-label class="text-weight-bold"
                                    >کارشناس اداری و منابع انسانی</q-item-label
                                  >

                                  <q-item-label
                                    class="text-weight-thin q-pt-xs"
                                  >
                                    تربت پاک
                                  </q-item-label>

                                  <q-item-label caption>
                                    تهران، ظفر
                                    <span class="text-grey-5"> | </span>

                                    <span class="text-positive"
                                      >10 - 12 میلیون تومان
                                    </span>
                                  </q-item-label>
                                </q-item-section>

                                <q-item-section class="q-pa-md" side top>
                                  <q-btn flat icon="favorite_outline" />
                                </q-item-section>
                              </q-item>

                              <div class="q-pr-lg">
                                <q-separator style="height: 1px" />
                              </div>

                              <div class="col-12 q-my-sm">
                                <div class="row justify-center">
                                  <div
                                    class="full-width row justify-between items-center"
                                  >
                                    <div class="col-3 text-grey-5">
                                      12 روز پیش
                                    </div>

                                    <div class="col-4 row justify-end">
                                      <q-btn
                                        icon-right="arrow_back"
                                        flat
                                        color="primary"
                                        label="مشاهده"
                                      />
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </q-list>
                        </div>

                        <div class="col-6 q-pl-sm">
                          <q-list
                            class="full-width bg-white br-10 q-my-sm"
                            bordered
                            separator
                          >
                            <div class="q-px-md">
                              <q-item class="col-12 q-my-xs">
                                <q-item-section class="q-pa-md" avatar>
                                  <q-avatar>
                                    <img
                                      src="https://fileapi.jobvision.ir/api/v1.0/files/getimage?fileid=153717&width=71&height=71"
                                    />
                                  </q-avatar>
                                </q-item-section>

                                <q-item-section caption class="q-pa-md">
                                  <q-item-label class="text-weight-bold"
                                    >کارشناس اداری و منابع انسانی</q-item-label
                                  >

                                  <q-item-label
                                    class="text-weight-thin q-pt-xs"
                                  >
                                    تربت پاک
                                  </q-item-label>

                                  <q-item-label caption>
                                    تهران، ظفر
                                    <span class="text-grey-5"> | </span>

                                    <span class="text-positive"
                                      >10 - 12 میلیون تومان
                                    </span>
                                  </q-item-label>
                                </q-item-section>

                                <q-item-section class="q-pa-md" side top>
                                  <q-btn flat icon="favorite_outline" />
                                </q-item-section>
                              </q-item>

                              <div class="q-pr-lg">
                                <q-separator style="height: 1px" />
                              </div>

                              <div class="col-12 q-my-sm">
                                <div class="row justify-center">
                                  <div
                                    class="full-width row justify-between items-center"
                                  >
                                    <div class="col-3 text-grey-5">
                                      12 روز پیش
                                    </div>

                                    <div class="col-4 row justify-end">
                                      <q-btn
                                        icon-right="arrow_back"
                                        flat
                                        color="primary"
                                        label="مشاهده"
                                      />
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </q-list>
                        </div>

                        <div class="col-6 q-pr-sm">
                          <q-list
                            class="full-width bg-white br-10 q-my-sm relative-position"
                            bordered
                            separator
                          >
                            <q-btn
                              class="absolute-center text-bold"
                              outline
                              color="red"
                              label="بسته شده"
                              disable
                              style="rotate: 344deg"
                            />

                            <div class="q-px-md closed-job">
                              <q-item class="col-12 q-my-xs">
                                <q-item-section class="q-pa-md" avatar>
                                  <q-avatar>
                                    <img
                                      src="https://fileapi.jobvision.ir/api/v1.0/files/getimage?fileid=153717&width=71&height=71"
                                    />
                                  </q-avatar>
                                </q-item-section>

                                <q-item-section caption class="q-pa-md">
                                  <q-item-label class="text-weight-bold"
                                    >کارشناس اداری و منابع انسانی</q-item-label
                                  >

                                  <q-item-label
                                    class="text-weight-thin q-pt-xs"
                                  >
                                    تربت پاک
                                  </q-item-label>

                                  <q-item-label caption>
                                    تهران، ظفر
                                    <span class="text-grey-5"> | </span>

                                    <span class="text-positive"
                                      >10 - 12 میلیون تومان
                                    </span>
                                  </q-item-label>
                                </q-item-section>

                                <q-item-section class="q-pa-md" side top>
                                  <q-btn flat icon="favorite_outline" />
                                </q-item-section>
                              </q-item>

                              <div class="q-pr-lg">
                                <q-separator style="height: 1px" />
                              </div>

                              <div class="col-12 q-my-sm">
                                <div class="row justify-center">
                                  <div
                                    class="full-width row justify-between items-center"
                                  >
                                    <div class="col-3 text-grey-5">
                                      12 روز پیش
                                    </div>

                                    <div class="col-4 row justify-end">
                                      <q-btn
                                        icon-right="arrow_back"
                                        flat
                                        color="primary"
                                        label="مشاهده"
                                      />
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </q-list>
                        </div>

                        <div class="col-6 q-pl-sm">
                          <q-list
                            class="full-width bg-white br-10 q-my-sm relative-position"
                            bordered
                            separator
                          >
                            <q-btn
                              class="absolute-center text-bold"
                              outline
                              color="red"
                              label="بسته شده"
                              disable
                              style="rotate: 344deg"
                            />

                            <div class="q-px-md closed-job">
                              <q-item class="col-12 q-my-xs">
                                <q-item-section class="q-pa-md" avatar>
                                  <div class="row">
                                    <q-badge
                                      class="q-my-xs q-mx-xs"
                                      color="red-1"
                                      text-color="negative"
                                      label="فوری"
                                    />
                                  </div>

                                  <q-avatar>
                                    <img
                                      src="https://fileapi.jobvision.ir/api/v1.0/files/getimage?fileid=153717&width=71&height=71"
                                    />
                                  </q-avatar>
                                </q-item-section>

                                <q-item-section caption class="q-pa-md">
                                  <q-item-label class="text-weight-bold"
                                    >کارشناس اداری و منابع انسانی</q-item-label
                                  >

                                  <q-item-label
                                    class="text-weight-thin q-pt-xs"
                                  >
                                    تربت پاک
                                  </q-item-label>

                                  <q-item-label caption>
                                    تهران، ظفر
                                  </q-item-label>
                                </q-item-section>

                                <q-item-section class="q-pa-md" side top>
                                  <q-btn flat icon="favorite_outline" />
                                </q-item-section>
                              </q-item>

                              <div class="q-pr-lg">
                                <q-separator style="height: 1px" />
                              </div>

                              <div class="col-12 q-my-sm">
                                <div class="row justify-center">
                                  <div
                                    class="full-width row justify-between items-center"
                                  >
                                    <div class="col-3 text-grey-5">
                                      12 روز پیش
                                    </div>

                                    <div class="col-4 row justify-end">
                                      <q-btn
                                        icon-right="arrow_back"
                                        flat
                                        color="primary"
                                        label="مشاهده"
                                      />
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </q-list>
                        </div>
                      </div>
                    </div>
                  </div>
                </q-tab-panel>

                <!-- Charts Of Company -->

                <q-tab-panel name="charts">
                  <!-- <div class="bg-white br-10">
                    <div class="full-width q-pa-md">
                      <div class="row justify-between">
                        <div class="col-6 q-px-md">
                          <q-card flat bordered>
                            <div>
                              <q-icon name="male" size="35px" />

                              <q-icon name="female" size="35px" />

                              <span class="text-bold" style="font-size: 13px"
                                >ترکیب جنسیتی کارکنان</span
                              >
                            </div>

                            <div class="row justify-center">
                              <div class="col-5">
                                <q-circular-progress
                                  :value="value"
                                  color="orange"
                                  class="q-ma-md"
                                />

                                <div class="col-5 q-px-md">
                                  <q-badge
                                    color="primary"
                                    rounded
                                    class="q-mr-sm"
                                  />Status
                                </div>
                              </div>
                            </div>
                          </q-card>
                        </div>
                      </div>
                    </div>
                  </div> -->
                </q-tab-panel>

                <!-- Members Of Company -->

                <q-tab-panel name="members">
                  <div class="bg-white br-10">
                    <div class="q-mx-md row justify-between q-pa-md">
                      <div class="col-4 q-pa-sm">
                        <div
                          class="flex justify-between"
                          style="background-color: #edf1f780"
                        >
                          <div
                            class="row justify-center items-center text-center full-width relative-position"
                          >
                            <q-img
                              class="absolute-top"
                              src="https://jobvision.ir/assets/images/company-detail/mobile-primary-background.svg"
                            />

                            <div class="bg-transparent q-pa-md">
                              <q-avatar size="125px" class="col-12">
                                <img
                                  src="https://fileapi.jobvision.ir/api/v1.0/files/getimage?fileid=1057986"
                                />
                              </q-avatar>

                              <div class="q-my-sm">
                                <div class="col-12 text-primary text-bold">
                                  رامین ظریفی
                                </div>

                                <div class="col-12 text-primary">
                                  مدیر منابع انسانی و امور اداری
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="col-4 q-pa-sm">
                        <div
                          class="flex justify-between"
                          style="background-color: #edf1f780"
                        >
                          <div
                            class="row justify-center items-center text-center full-width relative-position"
                          >
                            <q-img
                              class="absolute-top"
                              src="https://jobvision.ir/assets/images/company-detail/mobile-primary-background.svg"
                            />

                            <div class="bg-transparent q-pa-md">
                              <q-avatar size="125px" class="col-12">
                                <img
                                  src="https://fileapi.jobvision.ir/api/v1.0/files/getimage?fileid=1057986"
                                />
                              </q-avatar>

                              <div class="q-my-sm">
                                <div class="col-12 text-primary text-bold">
                                  رامین ظریفی
                                </div>

                                <div class="col-12 text-primary">
                                  مدیر منابع انسانی و امور اداری
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="col-4 q-pa-sm">
                        <div
                          class="flex justify-between"
                          style="background-color: #edf1f780"
                        >
                          <div
                            class="row justify-center items-center text-center full-width relative-position"
                          >
                            <q-img
                              class="absolute-top"
                              src="https://jobvision.ir/assets/images/company-detail/mobile-primary-background.svg"
                            />

                            <div class="bg-transparent q-pa-md">
                              <q-avatar size="125px" class="col-12">
                                <img
                                  src="https://fileapi.jobvision.ir/api/v1.0/files/getimage?fileid=1057986"
                                />
                              </q-avatar>

                              <div class="q-my-sm">
                                <div class="col-12 text-primary text-bold">
                                  رامین ظریفی
                                </div>

                                <div class="col-12 text-primary">
                                  مدیر منابع انسانی و امور اداری
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="col-4 q-pa-sm">
                        <div
                          class="flex justify-between"
                          style="background-color: #edf1f780"
                        >
                          <div
                            class="row justify-center items-center text-center full-width relative-position"
                          >
                            <q-img
                              class="absolute-top"
                              src="https://jobvision.ir/assets/images/company-detail/mobile-primary-background.svg"
                            />

                            <div class="bg-transparent q-pa-md">
                              <q-avatar size="125px" class="col-12">
                                <img
                                  src="https://fileapi.jobvision.ir/api/v1.0/files/getimage?fileid=1057986"
                                />
                              </q-avatar>

                              <div class="q-my-sm">
                                <div class="col-12 text-primary text-bold">
                                  رامین ظریفی
                                </div>

                                <div class="col-12 text-primary">
                                  مدیر منابع انسانی و امور اداری
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="col-4 q-pa-sm">
                        <div
                          class="flex justify-between"
                          style="background-color: #edf1f780"
                        >
                          <div
                            class="row justify-center items-center text-center full-width relative-position"
                          >
                            <q-img
                              class="absolute-top"
                              src="https://jobvision.ir/assets/images/company-detail/mobile-primary-background.svg"
                            />

                            <div class="bg-transparent q-pa-md">
                              <q-avatar size="125px" class="col-12">
                                <img
                                  src="https://fileapi.jobvision.ir/api/v1.0/files/getimage?fileid=1057986"
                                />
                              </q-avatar>

                              <div class="q-my-sm">
                                <div class="col-12 text-primary text-bold">
                                  رامین ظریفی
                                </div>

                                <div class="col-12 text-primary">
                                  مدیر منابع انسانی و امور اداری
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="col-4 q-pa-sm">
                        <div
                          class="flex justify-between"
                          style="background-color: #edf1f780"
                        >
                          <div
                            class="row justify-center items-center text-center full-width relative-position"
                          >
                            <q-img
                              class="absolute-top"
                              src="https://jobvision.ir/assets/images/company-detail/mobile-primary-background.svg"
                            />

                            <div class="bg-transparent q-pa-md">
                              <q-avatar size="125px" class="col-12">
                                <img
                                  src="https://fileapi.jobvision.ir/api/v1.0/files/getimage?fileid=1057986"
                                />
                              </q-avatar>

                              <div class="q-my-sm">
                                <div class="col-12 text-primary text-bold">
                                  رامین ظریفی
                                </div>

                                <div class="col-12 text-primary">
                                  مدیر منابع انسانی و امور اداری
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="col-4 q-pa-sm">
                        <div
                          class="flex justify-between"
                          style="background-color: #edf1f780"
                        >
                          <div
                            class="row justify-center items-center text-center full-width relative-position"
                          >
                            <q-img
                              class="absolute-top"
                              src="https://jobvision.ir/assets/images/company-detail/mobile-primary-background.svg"
                            />

                            <div class="bg-transparent q-pa-md">
                              <q-avatar size="125px" class="col-12">
                                <img
                                  src="https://fileapi.jobvision.ir/api/v1.0/files/getimage?fileid=1057986"
                                />
                              </q-avatar>

                              <div class="q-my-sm">
                                <div class="col-12 text-primary text-bold">
                                  رامین ظریفی
                                </div>

                                <div class="col-12 text-primary">
                                  مدیر منابع انسانی و امور اداری
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="col-4 q-pa-sm">
                        <div
                          class="flex justify-between"
                          style="background-color: #edf1f780"
                        >
                          <div
                            class="row justify-center items-center text-center full-width relative-position"
                          >
                            <q-img
                              class="absolute-top"
                              src="https://jobvision.ir/assets/images/company-detail/mobile-primary-background.svg"
                            />

                            <div class="bg-transparent q-pa-md">
                              <q-avatar size="125px" class="col-12">
                                <img
                                  src="https://fileapi.jobvision.ir/api/v1.0/files/getimage?fileid=1057986"
                                />
                              </q-avatar>

                              <div class="q-my-sm">
                                <div class="col-12 text-primary text-bold">
                                  رامین ظریفی
                                </div>

                                <div class="col-12 text-primary">
                                  مدیر منابع انسانی و امور اداری
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="col-4 q-pa-sm">
                        <div
                          class="flex justify-between"
                          style="background-color: #edf1f780"
                        >
                          <div
                            class="row justify-center items-center text-center full-width relative-position"
                          >
                            <q-img
                              class="absolute-top"
                              src="https://jobvision.ir/assets/images/company-detail/mobile-primary-background.svg"
                            />

                            <div class="bg-transparent q-pa-md">
                              <q-avatar size="125px" class="col-12">
                                <img
                                  src="https://fileapi.jobvision.ir/api/v1.0/files/getimage?fileid=1057986"
                                />
                              </q-avatar>

                              <div class="q-my-sm">
                                <div class="col-12 text-primary text-bold">
                                  رامین ظریفی
                                </div>

                                <div class="col-12 text-primary">
                                  مدیر منابع انسانی و امور اداری
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </q-tab-panel>
              </q-tab-panels>
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
    const expanded = ref(false);

    function toggleItem() {
      if (expanded.value) {
        expanded.value = false;
      } else {
        expanded.value = true;
      }
    }

    return {
      toggleItem,
      expanded,
      tab,
      slide,
      value: 71,
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

.closed-job {
  filter: blur(1px);
}
</style>
