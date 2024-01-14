<template>
  <q-page style="background-color: #f8f9fa">
    <div class="row justify-center q-pa-md">
      <div
        class="col-xs-12 col-sm-12 col-md-12 col-lg-8 col-xl-8 row q-pl-sm q-pr-lg"
      >
        <!-- Main Content -->

        <div class="full-width row justify-center">
          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-9 col-xl-9">
            <!-- Main Card -->

            <div>
              <!-- Main Card Image -->

              <q-img
                style="
                  border-top-right-radius: 10px !important;
                  border-top-left-radius: 10px !important;
                "
                src="https://fileapi.jobvision.ir/StaticFiles/Employer/DefaultImages/default-companyHeader.jpeg?v=20231122"
              />

              <!-- Main Card Content -->

              <div
                class="row relative-position"
                style="z-index: 1; margin-top: -35px"
              >
                <div class="full-width bg-white br-10">
                  <div class="full-width row justify-between q-pa-md">
                    <div class="full-width row">
                      <div class="col-2">
                        <q-avatar size="80px">
                          <img
                            src="https://fileapi.jobvision.ir/api/v1.0/files/getimage?fileid=4483058&width=80&height=80"
                          />
                        </q-avatar>
                      </div>

                      <div class="col-10 row">
                        <div class="full-width">
                          <div class="row justify-between">
                            <div class="col-10">
                              <div>
                                <span class="text-h5 text-bold">
                                  توسعه دهنده Front-End (senior & junior)
                                </span>

                                <span class="text-grey-6 text-bold">
                                  (12 روز پیش)
                                </span>
                              </div>
                            </div>

                            <div class="col-2 justify-end row">
                              <q-btn flat color="primary" icon="share" />

                              <q-btn
                                flat
                                color="primary"
                                icon="favorite_outline"
                              />
                            </div>
                          </div>
                        </div>

                        <div class="full-width row justify-between q-my-md">
                          <div class="col-6">
                            <span
                              class="text-h6 text-bold"
                              style="color: #5660f2 !important"
                            >
                              مجموعه تست هلپر
                            </span>
                          </div>

                          <div
                            class="col-4 flex justify-end"
                            style="font-size: 12px"
                          >
                            <div>35 - 25 ميليون تومان</div>

                            <div
                              class="text-primary"
                              style="border-bottom: 2px dotted"
                            >
                              حقوق دریافتی افراد در مشاغل مشابه
                            </div>
                          </div>
                        </div>

                        <div class="full-width row justify-between q-mb-md">
                          <div class="col-6">
                            <span class="text-grey-6" style="font-size: 12px">
                              تهران، اکباتان
                            </span>
                          </div>

                          <div class="col-4 flex justify-end">
                            <span class="text-grey-6" style="font-size: 12px">
                              تمام وقت
                            </span>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <q-separator class="full-width q-mb-md" style="height: 1px" />

                  <div class="full-width row justify-between q-px-lg q-pb-md">
                    <div class="col-8 row">
                      <div class="col-6">
                        <div>روز و ساعت کاری</div>
                        <div class="text-grey-6 q-pt-sm">
                          شنبه تا چهارشنبه 9 تا 17 -- پنج شنبه 9 تا 14
                        </div>
                      </div>

                      <div class="col-6 q-pl-sm">
                        <div>سفرهای کاری</div>
                        <div class="text-grey-6 q-pt-sm">-</div>
                      </div>
                    </div>

                    <div class="col-4">
                      <div>
                        <div>مزایا و تسهیلات</div>
                        <div class="text-grey-6 q-pt-sm">
                          پاداش - ساعت کاری منعطف
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- About Company Card -->

            <div class="q-mt-xl q-mb-lg">
              <div class="full-width row bg-white br-10">
                <div>
                  <q-tabs v-model="tab" class="text-primary">
                    <q-tab name="about" label="درباره شرکت" />
                  </q-tabs>
                </div>

                <div class="col-12 row q-pa-xl">
                  <div class="col-8 row justify-between">
                    <div class="col-6">
                      <div class="text-bold">اندازه سازمان</div>

                      <div class="text-grey-6 q-pt-sm">زیر 10 نفر</div>
                    </div>

                    <div class="col-6">
                      <div class="text-bold">صنعت</div>

                      <div class="text-grey-6 q-pt-sm">
                        اینترنت / تجارت الکترونیک / خدمات آنلاین
                      </div>
                    </div>
                  </div>

                  <div class="q-pt-lg full-width flex justify-center">
                    <div v-if="showMore">
                      <div class="text-bold q-py-md">خدمات و محصولات</div>

                      <div class="text-bold q-pb-sm">توصیف شرکت</div>

                      <div class="text-grey-7 q-pb-sm">
                        مجموعه ما از دو تیم برنامه نویسی و زبان تشکیل شده است.
                        در حال حاضر بزرگترین مجموعه در خصوص برگزاری آزمون های
                        آنلاین تافل در ایران هستیم.
                      </div>

                      <div class="full-width text-center">
                        <div class="text-primary q-py-md">
                          مشاهده سایر موقعیت های شغلی این سازمان
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Job`s Description Card -->

            <div class="q-mt-xl q-mb-lg">
              <div class="full-width row bg-white br-10 q-pa-lg">
                <div class="full-width q-pb-lg row items-center">
                  <div class="text-h6 text-bold">
                    شاخص های کلیدی از نظر کارفرما
                  </div>

                  <q-icon
                    class="q-px-sm"
                    name="help"
                    color="primary"
                    size="24px"
                  />
                </div>

                <div class="full-width row items-center">
                  <q-icon name="check_circle" color="grey-6" size="18px" />

                  <div class="q-px-md">2 سال سابقه کار در گروه شغلی مشابه</div>
                </div>

                <!-- Skills Section -->

                <div class="full-width row items-center q-py-md">
                  <q-icon name="check_circle" color="grey-6" size="18px" />

                  <div class="skill-border q-px-md q-mx-md q-my-xs">
                    Html & CSS - متوسط
                  </div>
                </div>

                <div class="full-width q-py-md">
                  <div class="text-h6 text-bold">شرح شغل و وظایف</div>

                  <div class="q-pt-md">
                    فرصت همکاری برای دو نیروی Senior و Junior در تیم ما فراهم
                    است.
                  </div>
                </div>

                <!-- Responsibilities -->

                <div class="full-width q-py-md">
                  <div class="text-bold">وظایف و مسؤلیت ها:</div>

                  <div class="q-pt-md">
                    <span class="text-grey-6">-</span>

                    <span class="q-px-md">
                      فرصت همکاری برای دو نیروی Senior و Junior در تیم ما فراهم
                      است.
                    </span>
                  </div>

                  <div class="q-pt-md">
                    <span class="text-grey-6">-</span>

                    <span class="q-px-md">
                      فرصت همکاری برای دو نیروی Senior و Junior در تیم ما فراهم
                      است.
                    </span>
                  </div>

                  <div class="q-pt-md">
                    <span class="text-grey-6">-</span>

                    <span class="q-px-md">
                      فرصت همکاری برای دو نیروی Senior و Junior در تیم ما فراهم
                      است.
                    </span>
                  </div>

                  <div class="q-pt-md">
                    <span class="text-grey-6">-</span>

                    <span class="q-px-md">
                      فرصت همکاری برای دو نیروی Senior و Junior در تیم ما فراهم
                      است.
                    </span>
                  </div>

                  <div class="q-pt-md">
                    <span class="text-grey-6">-</span>

                    <span class="q-px-md">
                      فرصت همکاری برای دو نیروی Senior و Junior در تیم ما فراهم
                      است.
                    </span>
                  </div>
                </div>

                <!-- Required Skills -->

                <div class="full-width q-py-md">
                  <div class="text-bold">مهارت و تجربه تخصصی مورد نیاز:</div>

                  <div class="q-pt-md">
                    <span class="text-grey-6">-</span>

                    <span class="q-px-md">
                      تسلط کامل به برنامه نویسی فرانت HTML ،CSS ،Javascript و
                      عملکرد مرورگرهای مختلف
                    </span>
                  </div>

                  <div class="q-pt-md">
                    <span class="text-grey-6">-</span>

                    <span class="q-px-md">
                      تسلط کامل به React.js و Next.js
                    </span>
                  </div>

                  <div class="q-pt-md">
                    <span class="text-grey-6">-</span>

                    <span class="q-px-md">
                      تسلط کامل به برنامه نویسی فرانت HTML ،CSS ،Javascript و
                      عملکرد مرورگرهای مختلف
                    </span>
                  </div>

                  <div class="q-pt-md">
                    <span class="text-grey-6">-</span>

                    <span class="q-px-md">
                      تسلط کامل به React.js و Next.js
                    </span>
                  </div>

                  <div class="q-pt-md">
                    <span class="text-grey-6">-</span>

                    <span class="q-px-md">
                      تسلط کامل به برنامه نویسی فرانت HTML ،CSS ،Javascript و
                      عملکرد مرورگرهای مختلف
                    </span>
                  </div>

                  <div class="q-pt-md">
                    <span class="text-grey-6">-</span>

                    <span class="q-px-md">
                      تسلط کامل به React.js و Next.js
                    </span>
                  </div>
                </div>

                <!-- Individual Skills -->

                <div class="full-width q-py-md">
                  <div class="text-bold">مهارت های فردی:</div>

                  <div class="q-pt-md">
                    <span class="text-grey-6">-</span>

                    <span class="q-px-md"> خلاقیت و مسئولیت پذیری </span>
                  </div>

                  <div class="q-pt-md">
                    <span class="text-grey-6">-</span>

                    <span class="q-px-md"> روحیه کار تیمی </span>
                  </div>

                  <div class="q-pt-md">
                    <span class="text-grey-6">-</span>

                    <span class="q-px-md"> اشتیاق یادگیری </span>
                  </div>
                </div>

                <div class="full-width q-my-md text-bold">
                  حقوق دریافتی با توجه به تجربه و توانایی شما قابل مذاکره است.
                </div>

                <!-- Employment Conditions -->

                <div class="full-width q-py-md">
                  <div class="text-bold text-h6">شرایط احراز شغل</div>

                  <div
                    class="full-width row justify-between items-ceneter q-py-sm"
                  >
                    <div class="col-3 background-light">
                      <div class="text-bold text-grey-7 q-pa-sm">سن</div>
                    </div>

                    <div class="col-8 background">
                      <div class="q-pa-sm">از 21 سال</div>
                    </div>
                  </div>

                  <div
                    class="full-width row justify-between items-ceneter q-py-sm"
                  >
                    <div class="col-3 background-light">
                      <div class="text-bold text-grey-7 q-pa-sm">جنسیت</div>
                    </div>

                    <div class="col-8 background">
                      <div class="q-pa-sm">تفاوتی ندارد</div>
                    </div>
                  </div>

                  <div
                    class="full-width row justify-between items-ceneter q-py-sm"
                  >
                    <div class="col-3 background-light">
                      <div class="text-bold text-grey-7 q-pa-sm">
                        نرم افزارها
                      </div>
                    </div>

                    <div class="background col-8 row">
                      <div class="q-py-sm">
                        <div class="q-mr-md row items-center q-mt-sm">
                          <div>
                            <div
                              class="text-white row q-px-sm q-py-xs"
                              style="
                                background-color: #5c6573 !important;
                                padding-top: 5px;
                                padding-bottom: 5px;
                                border-radius: 8px;
                              "
                            >
                              <div
                                class="text-bold q-ml-sm"
                                style="font-size: 13px"
                              >
                                Html & CSS
                              </div>

                              <q-separator
                                color="white"
                                class="q-mx-sm q-my-xs"
                                vertical
                              />

                              <div>پیشرفته</div>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="q-py-sm">
                        <div class="q-mr-md row items-center q-mt-sm">
                          <div>
                            <div
                              class="text-white row q-px-sm q-py-xs"
                              style="
                                background-color: #5c6573 !important;
                                padding-top: 5px;
                                padding-bottom: 5px;
                                border-radius: 8px;
                              "
                            >
                              <div
                                class="text-bold q-ml-sm"
                                style="font-size: 13px"
                              >
                                Html & CSS
                              </div>

                              <q-separator
                                color="white"
                                class="q-mx-sm q-my-xs"
                                vertical
                              />

                              <div>پیشرفته</div>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="q-py-sm">
                        <div class="q-mr-md row items-center q-mt-sm">
                          <div>
                            <div
                              class="text-white row q-px-sm q-py-xs"
                              style="
                                background-color: #5c6573 !important;
                                padding-top: 5px;
                                padding-bottom: 5px;
                                border-radius: 8px;
                              "
                            >
                              <div
                                class="text-bold q-ml-sm"
                                style="font-size: 13px"
                              >
                                Html & CSS
                              </div>

                              <q-separator
                                color="white"
                                class="q-mx-sm q-my-xs"
                                vertical
                              />

                              <div>پیشرفته</div>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="q-py-sm">
                        <div class="q-mr-md row items-center q-mt-sm">
                          <div>
                            <div
                              class="text-white row q-px-sm q-py-xs"
                              style="
                                background-color: #5c6573 !important;
                                padding-top: 5px;
                                padding-bottom: 5px;
                                border-radius: 8px;
                              "
                            >
                              <div
                                class="text-bold q-ml-sm"
                                style="font-size: 13px"
                              >
                                Html & CSS
                              </div>

                              <q-separator
                                color="white"
                                class="q-mx-sm q-my-xs"
                                vertical
                              />

                              <div>پیشرفته</div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Report Job -->

            <div class="q-mt-xl q-mb-lg">
              <div class="full-width row bg-white br-10 q-pa-lg">
                <q-icon name="priority_high" color="grey-6" />

                <q-btn
                  flat
                  class="q-px-md"
                  color="grey-6"
                  label="گزارش مشکل و تخلف آگهی"
                />
              </div>
            </div>
          </div>

          <!-- Left Side/Bottom Content -->

          <div
            class="gt-md col-lg-3 col-xl-3 row justify-center q-pl-lg q-pr-md"
          >
            <div>
              <q-card class="q-px-md row q-mb-md q-px-md q-pa-md br-10">
                <div class="q-my-md" style="font-size: 16px">
                  ارسال رزومه برای مجموعه تست هلپر
                </div>

                <div class="q-pa-md br-10" style="border: 2px solid #dde1e6">
                  <div class="full-width">معین صداقتی</div>

                  <div class="full-width text-grey-7">
                    دولوپر فول استک در شرکت آیترونیک
                  </div>

                  <div class="full-width">
                    <q-btn
                      flat
                      color="primary"
                      label="مشاهده رزومه"
                      to="my-cv"
                    />
                  </div>
                </div>
                <q-btn
                  class="full-width q-mt-md"
                  color="positive"
                  label="ارسال رزومه"
                />
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
    const toggleDropdown = ref(false);
    const showCard = ref(false);
    const showMore = ref(false);
    const tab = ref("about");

    function OpenDropdown() {
      if (toggleDropdown.value == false) {
        toggleDropdown.value = true;
        showCard.value = true;
      } else {
        toggleDropdown.value = false;
        showCard.value = false;
      }
    }

    return {
      tab,
      showMore,
      showCard,
      toggleDropdown,
      OpenDropdown,
    };
  },
};
</script>

<style scoped>
.background {
  background-color: #f8f9fa;
}

.background-light {
  background-color: #f6f7f9 !important;
}

.br-10 {
  border-radius: 10px !important;
}

.q-btn {
  padding: 4px 0;
}

.skill-border {
  border: 1px solid #5c6573 !important;
  border-radius: 4px !important;
}
</style>
