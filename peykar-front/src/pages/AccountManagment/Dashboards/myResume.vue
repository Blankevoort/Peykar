<template>
  <q-page class="row justify-center q-pb-md" style="background-color: #f8f9fa">
    <div class="col-xs-12 col-sm-11 col-md-11 col-lg-8 col-xl-7">
      <!-- Preferred Resume & Resume Complition Rate -->

      <div>
        <!-- Mobile Quick Access Section -->

        <div class="bg-white text-bold lt-md fixed-on-top">
          <div class="nav-container q-px-md">
            <div class="tabs-wrapper">
              <div
                v-for="tab in tabs"
                :key="tab.name"
                :class="['nav-tab', { active: activeTab === tab.name }]"
                @click="setActiveTab(tab.name)"
              >
                {{ tab.label }}
                <div class="underline" v-if="activeTab === tab.name"></div>
              </div>
            </div>
          </div>
        </div>

        <!-- Resume Complition Rate -->

        <div
          class="lt-md bg-white q-px-md q-pt-md q-pb-sm"
          style="
            box-shadow: 0 0.125rem 0.25rem #00000013 !important;
            margin-top: 54px;
          "
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
            <img
              class="q-pr-xs"
              src="https://jobvision.ir/assets/images/eye.svg"
            />

            <div class="q-px-xs gt-sm">نحوه نمایش رزومه به:</div>

            <q-select
              dense
              borderless
              v-model="preferred"
              :options="preferredOptions"
            />
          </div>

          <!-- Share And Download Resume -->

          <div
            class="col-xs-8 col-sm-8 col-md-8 col-lg-6 col-xl-6 justify-end row items-center"
          >
            <div class="row">
              <img
                src="https://jobvision.ir/assets/images/download-muted.svg"
              />

              <q-btn
                flat
                dense
                size="md"
                color="grey-7"
                label="دانلود رزومه"
                :class="dynamicBtnPadding"
              />
            </div>

            <div class="row q-gutter-x-sm">
              <img
                src="https://jobvision.ir/assets/images/share-muted.svg"
                class="gt-sm"
              />

              <q-btn
                flat
                dense
                color="grey-7"
                label="اشتراک گذاری رزومه "
                class="gt-sm"
              />
            </div>

            <img
              src="https://jobvision.ir/assets/images/share-muted.svg"
              class="lt-md"
            />
          </div>
        </div>
      </div>

      <!-- Resume Details -->

      <div class="q-mt-lg">
        <div class="row justify-between">
          <!-- Right Side -->

          <div
            :class="{ 'q-px-md': $q.screen.xs }"
            class="col-xs- col-sm- col-md-8 col-lg-8 col-xl-8 q-gutter-y-lg"
          >
            <!-- About -->

            <div id="about" :class="paddingClass">
              <BadgeAndTitle
                :progressValue="progressValue"
                title="درباره من"
                :showButton="true"
              >
                <!-- About Content -->

                <div class="q-py-md">
                  <div :class="aboutFirstSection">
                    <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 col-xl-8">
                      <div class="row items-center q-gutter-x-md">
                        <!-- Profile Picutre -->

                        <div class="relative-position q-py-xs">
                          <img
                            src="https://fileapi.jobvision.ir/StaticFiles/Candidate/DefaultImages/default-user-Male.png?v=20231122"
                            style="
                              border-radius: 50%;
                              width: 64px;
                              height: 64px;
                            "
                          />

                          <div class="absolute-bottom text-center">
                            <q-icon
                              name="border_color"
                              class="q-pa-xs"
                              style="
                                border-radius: 4px;
                                background-color: #dde1e6 !important;
                              "
                            />
                          </div>
                        </div>

                        <!-- Name and Job Title -->

                        <div class="q-gutter-y-sm">
                          <div class="text-bold" :style="aboutNameFontSize">
                            معین صداقتی
                          </div>

                          <div
                            class="text-grey-7 q-gutter-x-sm row items-center"
                          >
                            <div>دولوپر فول استک در شرکت آیترونیک</div>

                            <img
                              src="https://jobvision.ir/assets/images/cv-maker/edit-secondary.svg"
                            />
                          </div>
                        </div>
                      </div>
                    </div>

                    <!-- Add About Content? -->

                    <div :class="addAboutContent">
                      <div class="row q-gutter-x-sm">
                        <div
                          class="text-primary q-px-md q-py-sm"
                          style="border: 2px dashed #5660f2"
                        >
                          + افزودن
                        </div>

                        <img
                          src="https://jobvision.ir/assets/images/linkedin.svg"
                        />
                      </div>
                    </div>
                  </div>

                  <!-- User Description - Persian -->

                  <div class="text-grey-7 q-py-sm">
                    معین صداقتی متولد سال 1386/9/9. از 13 سالگی شروع به یاد گیری
                    برنامه نویسی کردم و از 15 سالگی به صورت جدی برنامه نویسی
                    میکنم. درحال تحصیل در رشته کامپیوتر.
                  </div>
                </div>
              </BadgeAndTitle>
            </div>

            <!-- Basic Information -->

            <div id="info" :class="paddingClass">
              <BadgeAndTitle
                :progressValue="progressValue"
                title="اطلاعات اولیه"
                :showButton="true"
              >
                <!-- Information Content -->

                <div class="q-py-xs">
                  <div
                    v-for="item in basicInformation"
                    :key="item"
                    class="q-py-sm"
                  >
                    <infoDisplay :title="item.title" :info="item.info" />
                  </div>
                </div>
              </BadgeAndTitle>
            </div>

            <!-- Educational Records -->

            <div id="education" :class="paddingClass">
              <useCard
                :progressValue="progressValue"
                title="سوابق تحصیلی"
                :showButton="false"
                :disableEditButton="true"
                :hasModel="hasEducation"
                noModel="تحصیلات دانشگاهی ندارم"
                :educationSection="true"
                :checkboxModel="noUniversityEducation"
                :isSmall="true"
              >
                <div class="q-gutter-y-xs">
                  <div class="text-bold">سطح: رشته</div>

                  <div class="text-grey-7">نام دانشگاه</div>

                  <div class="text-grey-7">سال تحصیل - سال پایان</div>

                  <div class="text-grey-7">معدل: معدل</div>
                </div>
              </useCard>
            </div>

            <!-- Work Experience -->

            <div id="workExperience" class="bg-white br-10 custom-shadow">
              <!-- Main Card -->

              <useCard
                :progressValue="progressValue"
                title="سوابق شغلی"
                :showButton="false"
                :disableEditButton="true"
                :hasModel="hasWorkExperience"
                noModel="سوابق شغلی ندارم"
                :educationSection="true"
                :checkboxModel="noWorkExperience"
                class="q-px-lg"
              >
                <div class="q-gutter-y-sm">
                  <div class="text-bold">عنوان شغلی</div>

                  <div class="text-bold">نام سازمان</div>

                  <div class="text-grey-7">از ماه و سال شروع - پایان</div>
                </div>
              </useCard>

              <!-- Rate The Company -->

              <div class="q-pa-lg" style="background-color: #defbe6">
                <div class="col-12 flex justify-center lt-sm">
                  <img
                    src="https://jobvision.ir/assets/images/my-cv/rate-to-company.svg"
                  />
                </div>

                <div
                  :class="[
                    'row',
                    isXsOrLarger ? 'justify-between' : 'justify-center',
                  ]"
                >
                  <div
                    :class="[
                      'col-12',
                      'col-sm-8',
                      'flex',
                      'items-center',
                      'q-gutter-y-sm',
                      isXsOrLarger
                        ? 'justify-right'
                        : 'justify-center text-center',
                    ]"
                  >
                    <div class="text-bold font-16">
                      به شرکت‌هایی که در آن تجربه کار داشته‌اید، امتیاز دهید.
                    </div>

                    <div class="text-grey-7">
                      به دیگران کمک کنید تا محیط کار مناسب خود را پیدا کنند.
                    </div>

                    <div class="q-pt-sm">
                      <q-btn
                        flat
                        icon-right="keyboard_backspace"
                        label="امتیاز به شرکت"
                        style="border: 2px solid black"
                        class="text-bold"
                      />
                    </div>
                  </div>

                  <div class="col-4 flex justify-end gt-xs">
                    <img
                      src="https://jobvision.ir/assets/images/my-cv/rate-to-company.svg"
                    />
                  </div>
                </div>
              </div>
            </div>

            <!-- Languages -->

            <div id="languages" :class="paddingClass">
              <BadgeAndTitle
                :progressValue="progressValue"
                title="زبان‌ها"
                :showButton="false"
              >
                <!-- Langs List -->

                <div
                  class="row items-center q-pt-sm"
                  v-for="lang in langs"
                  :key="lang.name"
                >
                  <div class="col-1 flex items-center">
                    <img
                      style="width: 16px"
                      src="https://jobvision.ir/assets/images/delete-secondary.svg"
                    />
                  </div>

                  <div class="col-">
                    <div>
                      <div
                        class="br-4 q-pa-xs text-white row items-center q-gutter-x-sm"
                        style="background-color: #5c6573 !important"
                      >
                        <div class="text-bold">{{ lang.name }}</div>

                        <q-separator class="q-py-xs" color="white" vertical />

                        <div>{{ lang.level }}</div>
                      </div>
                    </div>
                  </div>
                </div>
              </BadgeAndTitle>
            </div>

            <!-- Software Skills -->

            <div id="softwareSkills" :class="paddingClass">
              <BadgeAndTitle
                :progressValue="progressValue"
                title="مهارت های نرم افزاری"
                :showButton="false"
              >
                <!-- Software Skills List -->

                <div class="row items-center q-pt-lg">
                  <div
                    class="col- row items-center q-pt-sm q-px-sm"
                    v-for="software in softwareSkills"
                    :key="software.name"
                  >
                    <div class="col-">
                      <div class="row">
                        <div
                          class="br-4 q-pa-xs text-white row items-center q-gutter-x-sm"
                          style="background-color: #5c6573 !important"
                        >
                          <img
                            style="width: 16px"
                            src="https://jobvision.ir/assets/images/cv-maker/trash-white.svg"
                          />

                          <div class="row q-gutter-x-sm">
                            <div class="text-bold">{{ software.name }}</div>

                            <q-separator
                              class="q-py-xs"
                              color="white"
                              vertical
                            />

                            <div>{{ software.level }}</div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </BadgeAndTitle>
            </div>

            <!-- Additional Skills -->

            <div id="additionalSkills" :class="paddingClass">
              <BadgeAndTitle
                :progressValue="progressValue"
                title="مهارت‌های تکمیلی"
                :showButton="false"
                :badge="false"
              >
                <!-- Additional Skills Count -->

                <div class="text-grey-6 q-mt-md q-pb-sm font-12">
                  مهارت‌ها در رزومه فارسی ({{ additionalSkillsCount }} مهارت)
                </div>

                <!-- Additional Skills List -->

                <div
                  class="row items-center q-gutter-x-md q-pt-sm"
                  v-for="aSkills in additionalSkills"
                  :key="aSkills.name"
                >
                  <div
                    class="br-4 q-pa-xs text-white row items-center q-gutter-x-sm"
                    style="background-color: #5c6573 !important"
                  >
                    <img
                      style="width: 16px"
                      src="https://jobvision.ir/assets/images/cv-maker/trash-white.svg"
                    />

                    <div class="row q-pr-sm">
                      <div class="text-bold">{{ aSkills.name }}</div>
                    </div>
                  </div>
                </div>
              </BadgeAndTitle>
            </div>

            <!-- Additional Information Start -->

            <div class="q-mt-xl q-mb-lg text-bold text-center">
              افزایش شانس استخدام شما تنها با تکمیل کردن اطلاعات تکمیلی زیر
            </div>

            <!-- Additional Information Cards -->

            <div class="bg-white br-10 custom-shadow">
              <useCard
                :progressValue="progressValue"
                title="مدیران و همکاران سابق"
                :hasModel="true"
                class="q-px-lg"
                :isLarge="true"
                :noCheckbox="true"
                :isAdditional="true"
                id="formerColleagues"
              >
                <div>
                  <div class="q-gutter-y-sm">
                    <div class="text-bold">عاشر قلیچ سید محمدی</div>

                    <div class="text-grey-7">
                      <div>مدیر در aytronic</div>
                      <div>09112746075</div>
                    </div>

                    <div>
                      <span class="text-grey-7"> از سال 1402 تا اکنون </span>
                      <span>مدیر مستقیم</span>
                    </div>
                  </div>

                  <q-btn
                    dense
                    flat
                    color="primary"
                    label="درخواست توصیه نامه"
                  />
                </div>
              </useCard>

              <q-separator />

              <useCard
                :progressValue="progressValue"
                title="دوره‌های آموزشی"
                :hasModel="true"
                class="q-px-lg"
                :isLarge="true"
                :noCheckbox="true"
                :isAdditional="true"
                id="educationCourses"
              >
                <div class="q-gutter-y-sm">
                  <div class="text-bold">دوره نهم سفر به ماه</div>

                  <div class="text-grey-7">عاشر قلیچ سید محمدی</div>

                  <div class="text-grey-7">طول دوره: 1 سال</div>

                  <div class="text-grey-7">1401</div>
                </div>
              </useCard>

              <q-separator />

              <useCard
                :progressValue="progressValue"
                title="جوایز و افتخارات"
                :hasModel="true"
                class="q-px-lg"
                :noCheckbox="true"
                :isAdditional="true"
                id="awards"
              >
                <div class="q-gutter-y-sm">
                  <div class="text-bold">
                    نفر اول کشوری جشنواره نوجوان خوارزمی
                  </div>

                  <div class="text-grey-7">1402</div>
                </div>
              </useCard>

              <q-separator />

              <useCard
                :progressValue="progressValue"
                title="پروژه‌ها و تجربیات آکادمیک"
                :hasModel="false"
                class="q-px-lg"
                :noCheckbox="true"
                :isAdditional="true"
                id="academicExperiences"
              />
            </div>
          </div>

          <!-- Left Side & Mobile Bottom Content -->

          <div
            :class="{ 'q-px-md': $q.screen.xs }"
            class="col-xs- col-sm- col-md-4 col-lg-4 col-xl-4 q-gutter-lg"
          >
            <!-- Resume Complition Rate Card -->

            <div :class="[paddingClass, 'q-py-md', 'gt-sm']">
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
                  <img
                    src="https://jobvision.ir/assets/images/download-primary.svg"
                  />
                </div>
              </div>

              <!-- Card Links -->

              <div>
                <div class="text-bold">افزودن بخش های تکمیلی</div>

                <div class="row q-py-sm">
                  <q-btn
                    dense
                    class="q-px-sm"
                    flat
                    color="primary"
                    label="کتاب‌ها و مقالات"
                  />

                  <q-separator vertical />

                  <q-btn
                    dense
                    class="q-px-sm"
                    flat
                    color="primary"
                    label="پروژه‌ها و تجربیات آکادمیک"
                  />

                  <q-separator vertical />

                  <q-btn
                    dense
                    class="q-px-sm"
                    flat
                    color="primary"
                    label="+ 3 مورد دیگر"
                  />
                </div>
              </div>
            </div>

            <!-- Contact Ways, Voice and Personal Resume -->

            <div class="q-py-md br-10 bg-white q-my-lg custom-shadow">
              <!-- Contact Ways -->

              <div id="contactWays" class="q-px-lg">
                <div :class="titleClass">اطلاعات تماس</div>

                <div class="q-gutter-y-sm q-pt-md q-pb-lg">
                  <!-- Email -->

                  <div>
                    <div class="text-grey-7 row">
                      <div>آدرس ایمیل</div>

                      <q-space />

                      <img
                        src="https://jobvision.ir/assets/images/cv-maker/edit-secondary.svg"
                        style="width: 16px"
                      />
                    </div>

                    <div class="text-bold q-pt-sm">
                      moeensedaghaty86@gmail.com
                    </div>
                  </div>

                  <!-- Phone -->

                  <div>
                    <div class="text-grey-7 row">
                      <div>شماره موبایل</div>

                      <q-space />

                      <img
                        src="https://jobvision.ir/assets/images/cv-maker/edit-secondary.svg"
                        style="width: 16px"
                      />
                    </div>

                    <div class="text-bold q-pt-sm">09379608155</div>
                  </div>
                </div>
              </div>

              <q-separator color="grey-3" />

              <!-- Voice -->

              <div id="voice" class="q-px-lg">
                <BadgeAndTitle
                  :progressValue="progressValue"
                  title="معرفی صوتی"
                  :showButton="false"
                >
                  <!-- Voice Description and Benefits -->

                  <div class="q-py-md">
                    <div class="text-grey-7">
                      در این بخش، خود را در قالب یک صوت حداکثر دو دقیقه ای به
                      کارفرما معرفی کنید. در بسیاری از موارد شناختی که این معرفی
                      دو دقیقه ای برای کارفرمایان ایجاد میکند
                      <span class="text-bold text-grey-8"
                        >از رزومه شما بیشتر است.
                      </span>
                    </div>
                  </div>

                  <!-- Add or Record Voice -->

                  <div class="row justify-center items-center q-gutter-md">
                    <div class="bg-primary q-pa-sm text-center record-button">
                      <img
                        src="https://jobvision.ir/assets/images/my-cv/microphone.svg"
                        style="width: 13px"
                      />
                    </div>

                    <div class="text-primary text-h6">ضبط صدا</div>
                  </div>
                </BadgeAndTitle>
              </div>

              <q-separator color="grey-3" />

              <!-- Personal Resume -->

              <div id="personalResume" class="q-px-lg">
                <BadgeAndTitle
                  :progressValue="progressValue"
                  title="بارگذاری رزومه شخصی"
                  :showButton="false"
                >
                  <!-- Voice Description and Benefits -->

                  <div class="q-py-md">
                    <div class="text-grey-7">
                      در این بخش با بارگذاری فایل رزومه خود نیز می‌توانید به جذب
                      بهتر خود کمک کنید.
                    </div>
                  </div>

                  <!-- Image -->

                  <div class="text-center">
                    <q-img
                      src="https://jobvision.ir/assets/images/my-cv/cv-sample.svg"
                      style="width: 191px; height: 181px"
                    />
                  </div>
                </BadgeAndTitle>
              </div>
            </div>

            <!-- Portfolio -->

            <div id="portfolio" class="br-10 bg-white q-my-lg custom-shadow">
              <div class="q-px-lg">
                <BadgeAndTitle
                  :progressValue="progressValue"
                  title="نمونه کارها"
                  :showButton="false"
                >
                  <!-- Portfolio Content -->

                  <div class="q-pt-md q-pb-sm">
                    <div class="row">
                      <!-- Acion Buttons -->

                      <div class="col-3 text-grey-8">
                        <q-icon name="delete" size="24px" />
                        <q-icon class="q-pl-sm" name="edit" size="24px" />
                      </div>

                      <!-- Urls -->

                      <div class="col-9">
                        <div
                          class="row justify-end items-center q-gutter-x-md full-width"
                        >
                          <!-- Url -->

                          <a
                            target="_blank"
                            class="text-primary"
                            href="
                            https://moeensedaqati.ir/#/"
                            style="
                              cursor: pointer;
                              direction: ltr;
                              text-decoration: none;
                            "
                          >
                            https://moeensedaqati.ir/#/
                          </a>

                          <!-- Icon -->

                          <img
                            src="https://jobvision.ir/assets/images/my-cv/link-icon-primary.svg"
                          />
                        </div>
                      </div>
                    </div>
                  </div>
                </BadgeAndTitle>
              </div>
            </div>

            <!-- Calculator -->

            <div
              id="calculator"
              class="br-10 q-my-lg custom-shadow"
              style="background-color: #eeeffe !important"
            >
              <div class="q-px-xl q-py-lg text-center">
                <img
                  src="https://jobvision.ir/assets/images/my-cv/salary-table.svg"
                />

                <div class="q-pt-md text-bold" style="font-size: 12px">
                  از حقوق دریافتی افراد در مشاغل مختلف باخبر شوید
                </div>

                <div class="q-pb-md q-pt-sm" style="font-size: 11px">
                  حقوق و دستمزد مشاغل مختلف را بررسی کنید و تخمین دقیق‌تری از
                  حقوق منصفانه خود داشته باشید.
                </div>

                <q-btn
                  flat
                  to="salary"
                  color="primary"
                  class="text-bold"
                  style="font-size: 12px"
                  icon-right="keyboard_backspace"
                  label="ماشین حساب حقوق و دستمزد"
                />
              </div>
            </div>

            <!-- Test Results -->

            <div id="testResults" class="br-10 bg-white q-my-lg custom-shadow">
              <div class="q-px-lg q-py-md">
                <!-- Test Results Title -->

                <div :class="titleClass">نتایج تست‌ها</div>

                <!-- Test Results Content -->

                <div class="q-pt-md q-gutter-y-sm" style="">
                  <!-- Bar-On -->

                  <div class="row items-center">
                    <div class="col-8 row items-center q-gutter-sm">
                      <img
                        src="https://jobvision.ir/assets/images/tick-secondary.svg"
                      />
                      <div class="text-grey-6">Bar-On هوش هیجانی</div>
                    </div>

                    <div class="col-4 text-right">
                      <q-btn dense flat color="primary" label="شرکت در تست" />
                    </div>
                  </div>

                  <!-- MBTI -->

                  <div class="row items-center">
                    <div class="col-8 row items-center q-gutter-sm">
                      <img
                        src="https://jobvision.ir/assets/images/tick-primary.svg"
                      />
                      <div class="text-bold">MBTI شخصیت شناسی</div>
                    </div>

                    <div class="col-4 text-right">
                      <q-btn dense flat color="primary" label="مشاهده نتیجه" />
                    </div>
                  </div>

                  <!-- NEO -->

                  <div class="row items-center">
                    <div class="col-8 row items-center q-gutter-sm">
                      <img
                        src="https://jobvision.ir/assets/images/tick-secondary.svg"
                      />
                      <div class="text-grey-6">NEO شخصیت شناسی</div>
                    </div>

                    <div class="col-4 text-right">
                      <q-btn dense flat color="primary" label="شرکت در تست" />
                    </div>
                  </div>

                  <!-- Multiple Intelligences -->

                  <div class="row items-center">
                    <div class="col-8 row items-center q-gutter-sm">
                      <img
                        src="https://jobvision.ir/assets/images/tick-secondary.svg"
                      />
                      <div class="text-grey-6">هوش های چندگانه</div>
                    </div>

                    <div class="col-4 text-right">
                      <q-btn dense flat color="primary" label="شرکت در تست" />
                    </div>
                  </div>

                  <!-- Holland -->

                  <div class="row items-center">
                    <div class="col-8 row items-center q-gutter-sm">
                      <img
                        src="https://jobvision.ir/assets/images/tick-secondary.svg"
                      />
                      <div class="text-grey-6">Holland تیپ سنجی شغلی</div>
                    </div>

                    <div class="col-4 text-right">
                      <q-btn dense flat color="primary" label="شرکت در تست" />
                    </div>
                  </div>
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
import { ref, defineComponent, computed } from "vue";

import UseCard from "../../../components/ResumeCard.vue";
import BadgeAndTitle from "../../../components/ResumeCards/ResumeBadgeAndTitle.vue";
import infoDisplay from "../../../components/BasicInformationContent.vue";

export default defineComponent({
  components: {
    UseCard,
    infoDisplay,
    BadgeAndTitle,
  },

  computed: {
    paddingClass() {
      return {
        "q-px-xs": this.$q.screen.xs,
        "q-px-lg": !this.$q.screen.xs,
        "br-10": true,
        "bg-white": true,
        "custom-shadow": true,
      };
    },
    preferredResumeClasses() {
      return {
        "bg-white": this.$q.screen.gt.sm,
        "q-px-md": true,
        "q-pt-md": true,
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
    addAboutContent() {
      if (this.$q.screen.lt.md) {
        return "col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 flex justify-center";
      } else {
        return "col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 flex justify-end";
      }
    },
    aboutFirstSection() {
      return this.$q.screen.lt.md
        ? "row items-between items-center q-pb-md"
        : "row items-between items-center";
    },
    aboutNameFontSize() {
      return {
        fontSize: this.$q.screen.lt.md ? "12px" : "16px",
      };
    },
    titleClass() {
      return this.$q.screen.gt.sm ? "text-h6 text-bold" : "text-bold";
    },
    isXsOrLarger() {
      return this.$q.screen.gt.xs;
    },
  },

  setup() {
    const tabs = ref([
      { name: "about", label: "درباره من" },
      { name: "info", label: "اطلاعات اولیه" },
      { name: "education", label: "سوابق تحصیلی" },
      { name: "workExperience", label: "سوابق شغلی" },
      { name: "languages", label: "زبان‌ها" },
      { name: "softwareSkills", label: "مهارت های نرم افزاری" },
      { name: "additionalSkills", label: "مهارت‌های تکمیلی" },
      { name: "formerColleagues", label: "مدیران و همکاران سابق" },
      { name: "educationCourses", label: "دوره‌های آموزشی" },
      { name: "awards", label: "جوایز و افتخارات" },
      { name: "academicExperiences", label: "پروژه‌ها و تجربیات آکادمیک" },
      { name: "contactWays", label: "اطلاعات تماس" },
      { name: "voice", label: "معرفی صوتی" },
      { name: "personalResume", label: "بارگذاری رزومه شخصی" },
      { name: "portfolio", label: "نمونه کارها" },
      { name: "calculator", label: "ماشین حساب حقوق و دستمزد" },
      { name: "testResults", label: "سنتایج تست‌های" },
    ]);
    const activeTab = ref("about");

    const editEmail = ref(false);
    const editPhone = ref(false);
    const preferred = ref("خودم");
    const basicInformation = [
      { title: "نام و نام خانوادگی", info: "معین صداقتی" },
      { title: "جنسیت", info: "مرد" },
      { title: "وضعیت تاهل", info: "مجرد" },
      { title: "وضعیت نظام وظیفه", info: "معافیت تحصیلی" },
      { title: "شهر محل سکونت", info: "گنبد کاووس" },
      {
        title: "محل سکونت",
        info: "خیابان بخت غربی نرسیده به چهارراه فردوسی جنب یخچال سازی صوفی زاده و باطری سازی",
      },
      { title: "تاریخ تولد", info: "۱۳۸۸/۰۹/۰۹" },
      { title: "شماره ثابت", info: "۳۳۳۳۱۴۸۴" },
      { title: "حقوق درخواستی", info: "۸ - ۱۰ میلیون تومان" },
      { title: "نوع شغل مورد علاقه", info: "توسعه نرم افزار و برنامه نویسی" },
    ];

    // Educational Records

    const hasEducation = ref(true);
    const noUniversityEducation = ref(false);

    // Work Experience

    const noWorkExperience = ref(false);
    const hasWorkExperience = ref(true);

    // Languages

    const langs = ref([
      {
        name: "انگلیسی",
        level: "بالاتر از متوسط",
      },
      {
        name: "فارسی",
        level: "در حد زبان مادری",
      },
    ]);

    // Software Skills

    const softwareSkills = ref([
      {
        name: "Rest API",
        level: "پیشرفته",
      },
      {
        name: "VueJS",
        level: "پیشرفته",
      },
      {
        name: "Figma",
        level: "پیشرفته",
      },
      {
        name: "Html & CSS",
        level: "متوسط",
      },
      {
        name: "GIT",
        level: "متوسط",
      },
      {
        name: "Laravel",
        level: "متوسط",
      },
    ]);

    // Software Skills

    const additionalSkills = ref([
      {
        name: "برنامه نویسی فرانت اند",
      },
      {
        name: "اچ تی ام ال",
      },
      {
        name: "سی اس اس",
      },
      {
        name: "فیگما",
      },
      {
        name: "کویزار",
      },
      {
        name: "لاراول",
      },
    ]);
    const additionalSkillsCount = computed(() => additionalSkills.value.length);

    function setActiveTab(tabName) {
      activeTab.value = tabName;
      scrollToSection(tabName);
    }

    function scrollToSection(newTab) {
      const section = document.getElementById(newTab);
      if (section) {
        section.scrollIntoView({ behavior: "smooth" });
      }
    }

    return {
      tabs,
      langs,
      activeTab,
      editEmail,
      editPhone,
      preferred,
      value: 100,
      setActiveTab,
      hasEducation,
      softwareSkills,
      scrollToSection,
      noWorkExperience,
      basicInformation,
      progressValue: 0,
      additionalSkills,
      hasWorkExperience,
      noUniversityEducation,
      additionalSkillsCount,
      preferredOptions: ["خودم", "کارفرما"],
    };
  },
});
</script>

<style scoped>
.brb-10 {
  border-bottom-left-radius: 10px;
  border-bottom-right-radius: 10px;
}

.br-10 {
  border-radius: 10px;
}

.br-0 {
  border-radius: 0;
}

.custom-shadow {
  box-shadow: 0 1px 30px #00000008, 0 1px 2px #0000000d !important;
}

.record-button {
  border-radius: 50%;
  width: 40px;
  height: 40px;
}

.fixed-on-top {
  position: fixed;
  box-shadow: 0 0.125rem 0.25rem #00000013 !important;
  z-index: 1000;
  top: 68px;
}

.nav-container {
  display: flex;
  justify-content: space-around;
}

.tabs-wrapper {
  display: flex;
  overflow-x: auto;
  scrollbar-width: none;
  width: 100%;
}

.nav-tab {
  position: relative;
  cursor: pointer;
  color: black;
  font-weight: normal;
  padding: 1rem 1rem;
  flex-shrink: 0;
  font-weight: bold;
}

.nav-tab.active {
  font-weight: bold;
  color: #5660f2 !important;
}

.nav-tab .underline {
  content: "";
  position: absolute;
  width: 100%;
  height: 6px;
  background: #5660f2;
  bottom: 0;
  right: 0;
  border-radius: 6px 6px 0 0;
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
