<template>
  <q-page>
    <q-btn label="toggle share" no-caps @click="share = true" />

    <q-btn label="toggle about me" no-caps @click="editAbout = true" />

    <q-btn label="toggle picture change" no-caps @click="editPicture = true" />

    <q-btn
      label="toggle basic information"
      no-caps
      @click="information = true"
    />

    <q-btn
      label="toggle work experience"
      no-caps
      @click="createWorkExperience = true"
    />

    <q-btn label="toggle lang" no-caps @click="addLang = true" />

    <q-btn
      label="toggle add application"
      no-caps
      @click="addApplication = true"
    />

    <!-- Forms And Dialogs -->

    <!-- Profile Link Dialog -->

    <q-dialog class="q-pa-sm" v-model="share">
      <div class="relative-position bg-white q-pa-md" style="width: 600px">
        <div class="absolute-right q-pt-xs">
          <q-btn flat color="grey-6" icon="cancel" @click="share = false" />
        </div>

        <div class="full-width q-my-md">
          <span class="text-grey-7">آدرس یکتا رزومه شما</span>

          <div class="row justify-between q-my-sm q-px-xs">
            <div class="col-9">
              <q-input
                class="input-box"
                outlined
                color="grey-5"
                v-model="link"
              />
            </div>

            <div class="col-3 q-pl-md">
              <q-btn
                style="height: 45px"
                outline
                color="primary"
                label="کپی لینک"
                @click="copyLink"
              />
            </div>
          </div>
        </div>
      </div>
    </q-dialog>

    <!-- About Me Dialog -->

    <q-dialog class="q-pa-sm" v-model="editAbout">
      <div class="bg-white q-pa-md" style="width: 800px !important">
        <div
          class="full-width relative-position row justify-center"
          style="height: 45px"
        >
          <div class="absolute-right q-pt-sm">
            <q-btn flat color="grey-6" @click="editAbout = false">
              <q-icon name="cancel" size="32px" />
            </q-btn>
          </div>

          <div class="absolute-center text-h6 text-bold">ویرایش درباره من</div>
        </div>

        <div class="q-pa-md">
          <div class="q-pt-sm">
            <div class="row items-center">
              <div class="col-7 row">
                <q-avatar size="69px">
                  <q-img
                    src="https://fileapi.jobvision.ir/StaticFiles/Candidate/DefaultImages/default-user-Male.png?v=20231122"
                  />
                </q-avatar>

                <div class="col-8 q-pl-md">
                  <div>تصویر پروفایل</div>

                  <div class="text-grey-6 q-py-sm">
                    ‌فرمت‌های JPG, PNG, SVG, JPEG(حداکثر ۵١۲ کیلوبایت)
                  </div>
                </div>
              </div>

              <div class="col-5">
                <q-btn
                  class="text-bold"
                  flat
                  color="primary"
                  label="بارگذاری تصویر پروفایل"
                  icon="upload"
                />
              </div>
            </div>
          </div>

          <div class="q-mt-md q-mb-sm">
            <div class="row justify-between items-center">
              <div class="col-6 q-px-sm">
                <div class="text-grey-7">
                  <span class="q-pb-sm">عنوان شغلی نمایشی</span>

                  <q-btn flat>
                    <q-icon name="info" size="18px" />
                    <q-tooltip anchor="center left" self="center right">
                      Here I am!
                    </q-tooltip>
                  </q-btn>
                </div>

                <q-input outlined v-model="title" />
              </div>

              <div class="col-6 q-px-sm flex justify-end q-mt-sm">
                <div class="text-grey-7 q-pb-sm">Job Title</div>

                <q-input class="full-width" outlined v-model="en.title" />
              </div>
            </div>
          </div>

          <div class="q-my-md">
            <div class="full-width flex items-center">
              <div class="q-pb-sm text-grey-7">آدرس پروفایل لینکدین شما</div>

              <q-input outlined v-model="linkedin" class="full-width" />
            </div>
          </div>

          <div>
            <div class="row justify-between items-center">
              <div class="col-6 q-px-sm">
                <div class="text-grey-7 row justify-between">
                  <span class="q-pb-sm">چند جمله درباره خود بنویسید</span>

                  <span class="q-pb-sm">xxxx / 1000</span>
                </div>

                <q-input outlined type="textarea" v-model="description" />
              </div>

              <div class="col-6 q-px-sm flex justify-end">
                <div class="text-grey-7 full-width row justify-between">
                  <span class="q-pb-sm">xxxx / 1000</span>

                  <span class="q-pb-sm">Describe Yourself</span>
                </div>

                <q-input
                  class="full-width"
                  outlined
                  type="textarea"
                  v-model="en.description"
                />
              </div>
            </div>
          </div>

          <div class="full-width relative-position q-mt-md q-pb-md">
            <div class="absolute-right">
              <q-btn flat color="grey-7" label="انصراف" />

              <q-btn color="primary" label="ذخیره تغییرات" />
            </div>
          </div>
        </div>
      </div>
    </q-dialog>

    <!-- Basic Information Dialog -->

    <q-dialog v-model="information">
      <div class="bg-white" style="width: 800px !important; height: 602px">
        <div class="q-pa-md">
          <div
            class="full-width relative-position row justify-center"
            style="height: 45px"
          >
            <div class="absolute-right q-pt-sm">
              <q-btn flat color="grey-6" @click="editAbout = false">
                <q-icon name="cancel" size="32px" />
              </q-btn>
            </div>

            <div class="absolute-center text-h6 text-bold">
              افزودن اطلاعات اولیه
            </div>
          </div>

          <div class="q-mt-md q-mb-sm">
            <!-- Name -->

            <div class="row justify-between items-center q-my-md">
              <div class="col-6 q-px-sm">
                <div class="text-grey-7">
                  <span>نام</span>
                </div>

                <div class="q-pt-sm full-width">
                  <q-input outlined v-model="name" />
                </div>
              </div>

              <div class="col-6 q-px-sm flex justify-end">
                <div class="text-grey-7">
                  <span>First Name</span>
                </div>

                <div class="q-pt-sm full-width">
                  <q-input outlined v-model="en.name" />
                </div>
              </div>
            </div>

            <!-- Familty -->

            <div class="row justify-between items-center q-my-md">
              <div class="col-6 q-px-sm">
                <div class="text-grey-7">
                  <span>نام خانوادگی</span>
                </div>

                <div class="q-pt-sm full-width">
                  <q-input outlined v-model="lname" />
                </div>
              </div>

              <div class="col-6 q-px-sm flex justify-end">
                <div class="text-grey-7">
                  <span>Last Name</span>
                </div>

                <div class="q-pt-sm full-width">
                  <q-input outlined v-model="en.lname" />
                </div>
              </div>
            </div>

            <!-- Gender -->

            <div class="row justify-between items-center q-my-md">
              <div class="col-6 q-px-sm">
                <div class="text-grey-7 q-pb-sm">
                  <span>جنسیت</span>
                </div>

                <div class="q-pt-sm full-width gender-section">
                  <q-tabs
                    indicator-color="transparent"
                    v-model="gender"
                    no-caps
                    active-class="active-tab"
                  >
                    <q-tab name="male" label="مرد" />
                    <q-tab name="female" label="زن" />
                  </q-tabs>
                </div>
              </div>

              <div class="col-6 q-px-sm flex justify-end">
                <div class="text-grey-7 q-pb-sm">
                  <span>Gender</span>
                </div>

                <div class="q-pt-sm full-width gender-section">
                  <q-tabs
                    indicator-color="transparent"
                    v-model="gender"
                    no-caps
                    active-class="active-tab"
                  >
                    <q-tab name="male" label="Male" />
                    <q-tab name="female" label="Female" />
                  </q-tabs>
                </div>
              </div>
            </div>

            <!-- Marital Status -->

            <div class="row justify-between items-center q-my-md">
              <div class="col-6 q-px-sm">
                <div class="text-grey-7 q-pb-sm">
                  <span>وضعیت تاهل </span>
                </div>

                <div class="q-pt-sm full-width gender-section">
                  <q-tabs
                    indicator-color="transparent"
                    v-model="maritalStatus"
                    no-caps
                    active-class="active-tab"
                  >
                    <q-tab name="single" label="مجرد" />
                    <q-tab name="married" label="متاهل" />
                  </q-tabs>
                </div>
              </div>

              <div class="col-6 q-px-sm flex justify-end">
                <div class="text-grey-7 q-pb-sm">
                  <span>Marital Status</span>
                </div>

                <div class="q-pt-sm full-width gender-section">
                  <q-tabs
                    indicator-color="transparent"
                    v-model="maritalStatus"
                    no-caps
                    active-class="active-tab"
                  >
                    <q-tab name="single" label="Single" />
                    <q-tab name="married" label="Married" />
                  </q-tabs>
                </div>
              </div>
            </div>

            <!-- Military Service Status -->

            <div class="row justify-between items-center q-my-md">
              <div class="col-6 q-px-sm">
                <div class="text-grey-7">
                  <span>وضعیت نظام وظیفه</span>
                </div>

                <div class="q-pt-sm full-width">
                  <q-btn-dropdown
                    no-caps
                    class="full-width"
                    style="height: 55px"
                    outline
                    color="grey-7"
                    align="left"
                  >
                    <template v-slot:label>
                      <div class="full-width text-left">
                        <div>{{ militaryService }}</div>
                      </div>
                    </template>

                    <div>
                      <q-list>
                        <q-item
                          clickable
                          v-close-popup
                          @click="militaryService = 'انجام شده'"
                        >
                          <q-item-section>
                            <q-item-label>انجام شده</q-item-label>
                          </q-item-section>
                        </q-item>

                        <q-item
                          clickable
                          v-close-popup
                          @click="militaryService = 'معاف دائم'"
                        >
                          <q-item-section>
                            <q-item-label>معاف دائم</q-item-label>
                          </q-item-section>
                        </q-item>

                        <q-item
                          clickable
                          v-close-popup
                          @click="militaryService = 'معافیت تحصیلی'"
                        >
                          <q-item-section>
                            <q-item-label>معافیت تحصیلی</q-item-label>
                          </q-item-section>
                        </q-item>

                        <q-item
                          clickable
                          v-close-popup
                          @click="militaryService = 'در حال انجام'"
                        >
                          <q-item-section>
                            <q-item-label>در حال انجام</q-item-label>
                          </q-item-section>
                        </q-item>

                        <q-item
                          clickable
                          v-close-popup
                          @click="militaryService = 'مشمول'"
                        >
                          <q-item-section>
                            <q-item-label>مشمول</q-item-label>
                          </q-item-section>
                        </q-item>
                      </q-list>
                    </div>
                  </q-btn-dropdown>
                </div>
              </div>

              <div class="col-6 q-px-sm flex justify-end">
                <div class="text-grey-7">
                  <span>Military Service Status</span>
                </div>

                <div class="q-pt-sm full-width">
                  <q-btn-dropdown
                    no-caps
                    class="full-width"
                    style="height: 55px; direction: ltr"
                    outline
                    color="grey-7"
                    align="left"
                  >
                    <template v-slot:label>
                      <div class="full-width text-right">
                        <div>{{ en.militaryService }}</div>
                      </div>
                    </template>

                    <div>
                      <q-list>
                        <q-item
                          clickable
                          v-close-popup
                          @click="en.militaryService = 'Completed'"
                        >
                          <q-item-section>
                            <q-item-label>Completed</q-item-label>
                          </q-item-section>
                        </q-item>

                        <q-item
                          clickable
                          v-close-popup
                          @click="en.militaryService = 'Exempted'"
                        >
                          <q-item-section>
                            <q-item-label>Exempted</q-item-label>
                          </q-item-section>
                        </q-item>

                        <q-item
                          clickable
                          v-close-popup
                          @click="en.militaryService = 'Educational Exemption'"
                        >
                          <q-item-section>
                            <q-item-label>Educational Exemption</q-item-label>
                          </q-item-section>
                        </q-item>

                        <q-item
                          clickable
                          v-close-popup
                          @click="en.militaryService = 'Ongoing'"
                        >
                          <q-item-section>
                            <q-item-label>Ongoing</q-item-label>
                          </q-item-section>
                        </q-item>

                        <q-item
                          clickable
                          v-close-popup
                          @click="en.militaryService = 'Not served yet'"
                        >
                          <q-item-section>
                            <q-item-label>Not served yet</q-item-label>
                          </q-item-section>
                        </q-item>
                      </q-list>
                    </div>
                  </q-btn-dropdown>
                </div>
              </div>
            </div>

            <!-- City -->

            <div class="row justify-between items-center q-my-md">
              <div class="col-6 q-px-sm">
                <div class="text-grey-7">
                  <span>شهر محل سکونت</span>
                </div>

                <div class="q-pt-sm full-width">
                  <q-select
                    v-model="city"
                    :options="cityOptions"
                    color="primary"
                    outlined
                    clearable
                    use-input
                    @filter="filterFn"
                  >
                    <template v-slot:selected>
                      <div
                        class="q-pa-sm br-4"
                        style="background: #e0e0e0 !important"
                        v-if="city !== null"
                      >
                        {{ city }}
                      </div>
                    </template>
                  </q-select>
                </div>
              </div>

              <div class="col-6 q-px-sm flex justify-end q-pt-sm">
                <div class="text-grey-7">
                  <span>City</span>
                </div>

                <div class="q-pt-sm full-width" style="direction: ltr">
                  <q-select
                    v-model="enCity"
                    :options="cityOptions"
                    color="primary"
                    use-chips
                    outlined
                    clearable
                    use-input
                    @filter="filterFn"
                  >
                    <template v-slot:selected>
                      <div
                        class="q-pa-sm br-4"
                        style="background: #e0e0e0 !important"
                        v-if="enCity !== null"
                      >
                        {{ enCity }}
                      </div>
                    </template>
                  </q-select>
                </div>
              </div>
            </div>

            <!-- Region -->

            <div class="row justify-between items-center q-my-md">
              <div class="col-6 q-px-sm">
                <div class="text-grey-7">
                  <span>محله</span>

                  <q-btn flat color="primary" dense icon="info">
                    <q-tooltip
                      anchor="center left"
                      self="center right"
                      class="bg-blue-9 br-8"
                      style="width: 175px; font-size: 13px"
                    >
                      وارد کردن محل سکونت دقیق به ما کمک می کند که پیشنهادهای
                      شغلی نزدیک تر به محل زندگی شما را با اولویت بالاتری به شما
                      پیشنهاد دهیم
                    </q-tooltip>
                  </q-btn>
                </div>

                <div class="q-pt-sm full-width">
                  <q-input outlined v-model="region" />
                </div>
              </div>

              <div class="col-6 q-px-sm flex justify-end q-pt-sm">
                <div class="text-grey-7">
                  <span>Region</span>
                </div>

                <div class="q-pt-sm full-width">
                  <q-input outlined v-model="en.region" />
                </div>
              </div>
            </div>

            <!-- Birth -->

            <div class="row justify-between items-center q-my-md">
              <div class="col-6 q-px-sm">
                <div @click="showBirth = true" class="text-grey-7">
                  <span>تاریخ تولد</span>

                  <q-btn-dropdown
                    content-class="text-center"
                    no-caps
                    unelevated
                    class="full-width q-py-sm q-mt-sm"
                    color="primary"
                  >
                    <template v-slot:label>
                      <div class="full-width text-left">
                        <div>انتخاب تاریخ</div>
                      </div>
                    </template>

                    <q-date
                      minimal
                      v-model="birth"
                      mask="YYYY/MM/DD"
                      calendar="persian"
                    />
                  </q-btn-dropdown>
                </div>
              </div>

              <div class="col-6 q-px-sm flex justify-end">
                <div class="text-grey-7">
                  <span>Birth Date</span>
                </div>

                <q-btn-dropdown
                  content-class="text-center"
                  no-caps
                  unelevated
                  style="direction: ltr"
                  class="full-width q-py-sm q-mt-sm"
                  color="primary"
                >
                  <template v-slot:label>
                    <div class="full-width text-right">
                      <div>Select Date</div>
                    </div>
                  </template>

                  <q-date minimal v-model="enBirth" />
                </q-btn-dropdown>
              </div>
            </div>

            <!-- Number -->

            <div class="row justify-between items-center q-my-md">
              <div class="col-6 q-px-sm">
                <div class="text-grey-7">
                  <span>شماره تلفن ثابت (اختیاری)</span>

                  <q-btn flat color="primary" dense icon="info">
                    <q-tooltip
                      anchor="center left"
                      self="center right"
                      class="bg-blue-9 br-8"
                      style="width: 175px; font-size: 13px"
                    >
                      در صورتی که کارفرما بخواهد با شما تماس بگیرد و موبایل شما
                      در دسترس نباشد این شماره تلفن ثابت به شما کمک می کند که
                      تماس کارفرما را از دست ندهید
                    </q-tooltip>
                  </q-btn>
                </div>

                <div class="q-pt-sm full-width">
                  <q-input outlined type="number" v-model.number="number" />
                </div>
              </div>

              <div class="col-6 q-px-sm flex justify-end q-pt-sm">
                <div class="text-grey-7">
                  <span>Phone Number (Optional)</span>
                </div>

                <div class="q-pt-sm full-width">
                  <q-input type="number" outlined v-model.number="enNumber" />
                </div>
              </div>
            </div>

            <!-- Minimum Expected Salary -->

            <div class="row justify-between items-center q-my-md">
              <div class="col-6 q-px-sm">
                <div class="text-grey-7">
                  <span>حقوق درخواستی</span>
                </div>

                <div class="q-pt-sm full-width">
                  <q-btn-dropdown
                    no-caps
                    class="full-width"
                    style="height: 55px"
                    outline
                    color="grey-7"
                    align="left"
                  >
                    <template v-slot:label>
                      <div class="full-width text-left">
                        <div>{{ expectedSalary }}</div>
                      </div>
                    </template>

                    <div>
                      <q-list>
                        <q-item
                          clickable
                          v-close-popup
                          @click="expectedSalary = '3 - 2 میلیون تومان'"
                        >
                          <q-item-section>
                            <q-item-label>3 - 2 میلیون تومان</q-item-label>
                          </q-item-section>
                        </q-item>

                        <q-item
                          clickable
                          v-close-popup
                          @click="expectedSalary = '4 - 3 میلیون تومان'"
                        >
                          <q-item-section>
                            <q-item-label>4 - 3 میلیون تومان</q-item-label>
                          </q-item-section>
                        </q-item>

                        <q-item
                          clickable
                          v-close-popup
                          @click="expectedSalary = '5 - 4 میلیون تومان'"
                        >
                          <q-item-section>
                            <q-item-label>5 - 4 میلیون تومان</q-item-label>
                          </q-item-section>
                        </q-item>

                        <q-item
                          clickable
                          v-close-popup
                          @click="expectedSalary = '6 - 5 میلیون تومان'"
                        >
                          <q-item-section>
                            <q-item-label>6 - 5 میلیون تومان</q-item-label>
                          </q-item-section>
                        </q-item>

                        <q-item
                          clickable
                          v-close-popup
                          @click="expectedSalary = '8 - 6 میلیون تومان'"
                        >
                          <q-item-section>
                            <q-item-label>8 - 6 میلیون تومان</q-item-label>
                          </q-item-section>
                        </q-item>

                        <q-item
                          clickable
                          v-close-popup
                          @click="expectedSalary = '10 - 8 میلیون تومان'"
                        >
                          <q-item-section>
                            <q-item-label>10 - 8 میلیون تومان</q-item-label>
                          </q-item-section>
                        </q-item>

                        <q-item
                          clickable
                          v-close-popup
                          @click="expectedSalary = '12 - 10 میلیون تومان'"
                        >
                          <q-item-section>
                            <q-item-label>12 - 10 میلیون تومان</q-item-label>
                          </q-item-section>
                        </q-item>

                        <q-item
                          clickable
                          v-close-popup
                          @click="expectedSalary = '15 - 12 میلیون تومان'"
                        >
                          <q-item-section>
                            <q-item-label>15 - 12 میلیون تومان</q-item-label>
                          </q-item-section>
                        </q-item>

                        <q-item
                          clickable
                          v-close-popup
                          @click="expectedSalary = '25 - 20 میلیون تومان'"
                        >
                          <q-item-section>
                            <q-item-label>25 - 20 میلیون تومان</q-item-label>
                          </q-item-section>
                        </q-item>

                        <q-item
                          clickable
                          v-close-popup
                          @click="expectedSalary = '35 - 25 ميليون تومان'"
                        >
                          <q-item-section>
                            <q-item-label>35 - 25 ميليون تومان</q-item-label>
                          </q-item-section>
                        </q-item>

                        <q-item
                          clickable
                          v-close-popup
                          @click="expectedSalary = '45 - 35 ميليون تومان'"
                        >
                          <q-item-section>
                            <q-item-label>45 - 35 ميليون تومان</q-item-label>
                          </q-item-section>
                        </q-item>

                        <q-item
                          clickable
                          v-close-popup
                          @click="expectedSalary = '60 - 45 میلیون تومان'"
                        >
                          <q-item-section>
                            <q-item-label>60 - 45 میلیون تومان</q-item-label>
                          </q-item-section>
                        </q-item>

                        <q-item
                          clickable
                          v-close-popup
                          @click="expectedSalary = '60 میلیون تومان به بالا'"
                        >
                          <q-item-section>
                            <q-item-label>60 میلیون تومان به بالا</q-item-label>
                          </q-item-section>
                        </q-item>
                      </q-list>
                    </div>
                  </q-btn-dropdown>
                </div>
              </div>

              <div class="col-6 q-px-sm flex justify-end">
                <div class="text-grey-7">
                  <span>Minimum Expected Salary</span>
                </div>

                <div class="q-pt-sm full-width">
                  <q-btn-dropdown
                    no-caps
                    class="full-width"
                    style="height: 55px; direction: ltr"
                    outline
                    color="grey-7"
                    align="left"
                  >
                    <template v-slot:label>
                      <div class="full-width text-right">
                        <div>{{ enMilitaryService }}</div>
                      </div>
                    </template>

                    <div>
                      <q-list>
                        <q-item
                          clickable
                          v-close-popup
                          @click="expectedSalary = '2 - 3 Million Tomans'"
                        >
                          <q-item-section>
                            <q-item-label>2 - 3 Million Tomans</q-item-label>
                          </q-item-section>
                        </q-item>

                        <q-item
                          clickable
                          v-close-popup
                          @click="expectedSalary = '3 - 4 Million Tomans'"
                        >
                          <q-item-section>
                            <q-item-label>3 - 4 Million Tomans</q-item-label>
                          </q-item-section>
                        </q-item>

                        <q-item
                          clickable
                          v-close-popup
                          @click="expectedSalary = '5 - 6 Million Tomans'"
                        >
                          <q-item-section>
                            <q-item-label>5 - 6 Million Tomans</q-item-label>
                          </q-item-section>
                        </q-item>

                        <q-item
                          clickable
                          v-close-popup
                          @click="expectedSalary = '6 - 8 Million Tomans'"
                        >
                          <q-item-section>
                            <q-item-label>6 - 8 Million Tomans</q-item-label>
                          </q-item-section>
                        </q-item>

                        <q-item
                          clickable
                          v-close-popup
                          @click="expectedSalary = '8 - 10 Million Tomans'"
                        >
                          <q-item-section>
                            <q-item-label>8 - 10 Million Tomans</q-item-label>
                          </q-item-section>
                        </q-item>

                        <q-item
                          clickable
                          v-close-popup
                          @click="expectedSalary = '10 - 12 Million Tomans'"
                        >
                          <q-item-section>
                            <q-item-label>10 - 12 Million Tomans</q-item-label>
                          </q-item-section>
                        </q-item>

                        <q-item
                          clickable
                          v-close-popup
                          @click="expectedSalary = '12 - 15 Million Tomans'"
                        >
                          <q-item-section>
                            <q-item-label>12 - 15 Million Tomans</q-item-label>
                          </q-item-section>
                        </q-item>

                        <q-item
                          clickable
                          v-close-popup
                          @click="expectedSalary = '15 - 20 Million Tomans'"
                        >
                          <q-item-section>
                            <q-item-label>15 - 20 Million Tomans</q-item-label>
                          </q-item-section>
                        </q-item>

                        <q-item
                          clickable
                          v-close-popup
                          @click="expectedSalary = '20 - 25 Million Tomans'"
                        >
                          <q-item-section>
                            <q-item-label>20 - 25 Million Tomans</q-item-label>
                          </q-item-section>
                        </q-item>

                        <q-item
                          clickable
                          v-close-popup
                          @click="expectedSalary = '25 - 35 Million Tomans'"
                        >
                          <q-item-section>
                            <q-item-label>25 - 35 Million Tomans</q-item-label>
                          </q-item-section>
                        </q-item>

                        <q-item
                          clickable
                          v-close-popup
                          @click="expectedSalary = '35 - 45 Million Tomans'"
                        >
                          <q-item-section>
                            <q-item-label>35 - 45 Million Tomans</q-item-label>
                          </q-item-section>
                        </q-item>

                        <q-item
                          clickable
                          v-close-popup
                          @click="expectedSalary = '45 - 60 Million Tomans'"
                        >
                          <q-item-section>
                            <q-item-label>45 - 60 Million Tomans</q-item-label>
                          </q-item-section>
                        </q-item>

                        <q-item
                          clickable
                          v-close-popup
                          @click="expectedSalary = 'Above 60 Million Tomans'"
                        >
                          <q-item-section>
                            <q-item-label>Above 60 Million Tomans</q-item-label>
                          </q-item-section>
                        </q-item>
                      </q-list>
                    </div>
                  </q-btn-dropdown>
                </div>
              </div>
            </div>

            <!-- Preferred Job Category -->

            <div class="row justify-between items-center q-my-md">
              <div class="col-6 q-px-sm">
                <div class="text-grey-7">
                  <span>علاقمند به استخدام در کدام حوزه شغلی هستید؟ </span>

                  <q-btn flat color="primary" dense icon="info">
                    <q-tooltip
                      anchor="center left"
                      self="center right"
                      class="bg-blue-9 br-8"
                      style="width: 175px; font-size: 13px"
                    >
                      شما با وارد کردن گروه های شغلی مورد علاقه خود می توانید
                      آگهی های شغلی مرتبط با این گروه ها را در قالب ایمیل دریافت
                      کنید.
                    </q-tooltip>
                  </q-btn>
                </div>

                <div class="q-pt-sm full-width">
                  <q-select
                    v-model="jobCategory"
                    :options="jobOptions"
                    color="primary"
                    outlined
                    clearable
                    use-input
                    use-chips
                    multiple
                    stack-label
                    @filter="filterJobs"
                    input-debounce="0"
                  />
                </div>
              </div>

              <div class="col-6 q-px-sm flex justify-end q-pt-sm">
                <div class="text-grey-7">
                  <span>Preferred Job Category</span>
                </div>

                <div class="q-pt-sm full-width" style="direction: ltr">
                  <q-select
                    v-model="enJobCategory"
                    :options="jobOptions"
                    color="primary"
                    outlined
                    clearable
                    use-input
                    use-chips
                    multiple
                    stack-label
                    @filter="filterJobs"
                    input-debounce="0"
                  />
                </div>
              </div>
            </div>

            <!-- Foreigner -->

            <div class="row justify-between items-center q-my-md">
              <div class="col-6 q-px-sm">
                <div class="text-grey-7">
                  <q-checkbox v-model="foreigner" />

                  <span> اتباع خارجی هستم </span>
                </div>
              </div>

              <div class="col-6 q-px-sm flex justify-end q-pt-sm">
                <div class="text-grey-7">
                  <q-checkbox v-model="foreigner" />

                  <span>I am Foreigner</span>
                </div>
              </div>
            </div>

            <!-- Disability -->

            <div class="row justify-between items-center q-my-md">
              <div class="col-6 q-px-sm">
                <div class="text-grey-7">
                  <q-checkbox v-model="disability" />

                  <span> دارای معلولیت هستم </span>
                </div>
              </div>

              <div class="col-6 q-px-sm flex justify-end q-pt-sm">
                <div class="text-grey-7">
                  <q-checkbox v-model="disability" />

                  <span>I have a disability</span>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div
          class="full-width bg-white q-pa-md text-right"
          style="position: sticky; bottom: 0"
        >
          <div class="q-mt-md">
            <q-btn flat color="grey-7" unelevated label="انصراف" />

            <q-btn color="primary" unelevated label="ذخیره تغییرات" />
          </div>
        </div>
      </div>
    </q-dialog>

    <!-- Create Work Experience Dialog -->

    <q-dialog v-model="createWorkExperience">
      <div class="bg-white" style="width: 800px !important; height: 602px">
        <div
          class="full-width relative-position row justify-center"
          style="height: 45px"
        >
          <div class="absolute-right q-pt-sm">
            <q-btn flat color="grey-6" @click="createWorkExperience = false">
              <q-icon name="cancel" size="32px" />
            </q-btn>
          </div>

          <div class="absolute-center text-h6 text-bold">
            افزودن سابقه شغلی جدید
          </div>
        </div>

        <div class="q-pa-md">
          <!-- Job Title -->

          <div class="row justify-between items-center q-my-md">
            <div class="col-6 q-px-sm">
              <div class="text-grey-7">
                <span>عنوان شغل</span>
              </div>

              <div class="q-pt-sm full-width">
                <q-input outlined v-model="jobTitle" />
              </div>
            </div>

            <div class="col-6 q-px-sm flex justify-end">
              <div class="text-grey-7">
                <span>Job Title</span>
              </div>

              <div class="q-pt-sm full-width">
                <q-input outlined v-model="enJobTitle" />
              </div>
            </div>
          </div>

          <!-- Job Category -->

          <div class="row justify-between items-center q-my-md">
            <div class="col-6 q-px-sm">
              <div class="text-grey-7">
                <span>زمینه فعالیت شما در این شرکت </span>

                <q-btn flat color="primary" dense icon="info">
                  <q-tooltip
                    anchor="center left"
                    self="center right"
                    class="bg-blue-9 br-8"
                    style="width: 175px; font-size: 13px"
                  >
                    مثلا زمینه فعالیت شغل حسابدار،مالی و حسابداری می باشد
                  </q-tooltip>
                </q-btn>
              </div>

              <div class="q-pt-sm full-width">
                <q-select
                  v-model="whatJobCategory"
                  :options="whatJobOptions"
                  color="primary"
                  outlined
                  clearable
                  use-input
                  use-chips
                  stack-label
                  @filter="filterWhatJobs"
                  input-debounce="0"
                >
                  <template v-slot:selected>
                    <div v-if="whatJobCategory">
                      <div
                        class="q-pa-sm br-4"
                        style="background: #e0e0e0 !important"
                      >
                        {{ whatJobCategory }}
                      </div>
                    </div>
                  </template>
                </q-select>
              </div>
            </div>

            <div class="col-6 q-px-sm flex justify-end q-pt-sm">
              <div class="text-grey-7">
                <span>Job Category</span>
              </div>

              <div class="q-pt-sm full-width" style="direction: ltr">
                <q-select
                  v-model="enWhatJobCategory"
                  :options="enWhatJobOptions"
                  color="primary"
                  outlined
                  clearable
                  use-input
                  use-chips
                  stack-label
                  @filter="filterWhatJobs"
                  input-debounce="0"
                >
                  <template v-slot:selected>
                    <div v-if="enWhatJobCategory">
                      <div
                        class="q-pa-sm br-4"
                        style="background: #e0e0e0 !important"
                      >
                        {{ enWhatJobCategory }}
                      </div>
                    </div>
                  </template>
                </q-select>
              </div>
            </div>
          </div>

          <!-- Seniority Level -->

          <div class="row justify-between items-center q-my-md">
            <div class="col-6 q-px-sm">
              <div class="text-grey-7">
                <span>رده سازمانی </span>
              </div>

              <div class="q-pt-sm full-width">
                <q-select
                  v-model="seniorityLevel"
                  :options="seniorityLevelOptions"
                  color="primary"
                  outlined
                  clearable
                  use-input
                  use-chips
                  stack-label
                  @filter="filterSeniorityLevel"
                  input-debounce="0"
                >
                  <template v-slot:selected>
                    <div v-if="seniorityLevel">
                      <div
                        class="q-pa-sm br-4"
                        style="background: #e0e0e0 !important"
                      >
                        {{ seniorityLevel }}
                      </div>
                    </div>
                  </template>
                </q-select>
              </div>
            </div>

            <div class="col-6 q-px-sm flex justify-end q-pt-sm">
              <div class="text-grey-7">
                <span>Seniority Level</span>
              </div>

              <div class="q-pt-sm full-width" style="direction: ltr">
                <q-select
                  v-model="seniorityLevel"
                  :options="enSeniorityLevelOptions"
                  color="primary"
                  outlined
                  clearable
                  use-input
                  use-chips
                  stack-label
                  @filter="filterSeniorityLevel"
                  input-debounce="0"
                >
                  <template v-slot:selected>
                    <div v-if="enSeniorityLevel">
                      <div
                        class="q-pa-sm br-4"
                        style="background: #e0e0e0 !important"
                      >
                        {{ enSeniorityLevel }}
                      </div>
                    </div>
                  </template>
                </q-select>
              </div>
            </div>
          </div>

          <!-- Company Name -->

          <div class="row justify-between items-center q-my-md">
            <div class="col-6 q-px-sm">
              <div class="text-grey-7">
                <span>نام سازمان</span>
              </div>

              <div class="q-pt-sm full-width">
                <q-input outlined v-model="companyName" />
              </div>
            </div>

            <div class="col-6 q-px-sm flex justify-end">
              <div class="text-grey-7">
                <span>Company Name</span>
              </div>

              <div class="q-pt-sm full-width">
                <q-input outlined v-model="enCompanyName" />
              </div>
            </div>
          </div>

          <!-- Industry (Optional) -->

          <div class="row justify-between items-center q-my-md">
            <div class="col-6 q-px-sm">
              <div class="text-grey-7">
                <span>زمینه فعالیت شرکت (اختیاری) </span>

                <q-btn flat color="primary" dense icon="info">
                  <q-tooltip
                    anchor="center left"
                    self="center right"
                    class="bg-blue-9 br-8"
                    style="width: 175px; font-size: 13px"
                  >
                    زمینه فعالیت شرکتی که در آن مشغول بودید (مثال: مدیر مالی
                    شرکت کاله - زمینه فعالیت شرکت: کالاهای مصرفی و تند گردش)
                  </q-tooltip>
                </q-btn>
              </div>

              <div class="q-pt-sm full-width">
                <q-select
                  v-model="industry"
                  :options="industryOptions"
                  color="primary"
                  outlined
                  clearable
                  use-input
                  use-chips
                  stack-label
                  @filter="filterIndustry"
                  input-debounce="0"
                >
                  <template v-slot:selected>
                    <div v-if="seniorityLevel">
                      <div
                        class="q-pa-sm br-4"
                        style="background: #e0e0e0 !important"
                      >
                        {{ seniorityLevel }}
                      </div>
                    </div>
                  </template>
                </q-select>
              </div>
            </div>

            <div class="col-6 q-px-sm flex justify-end q-pt-sm">
              <div class="text-grey-7">
                <span>Industry (Optional) </span>
              </div>

              <div class="q-pt-sm full-width" style="direction: ltr">
                <q-select
                  v-model="enIndustry"
                  :options="enIndustryOptions"
                  color="primary"
                  outlined
                  clearable
                  use-input
                  use-chips
                  stack-label
                  @filter="filterENIndustry"
                  input-debounce="0"
                >
                  <template v-slot:selected>
                    <div v-if="enIndustry">
                      <div
                        class="q-pa-sm br-4"
                        style="background: #e0e0e0 !important"
                      >
                        {{ enIndustry }}
                      </div>
                    </div>
                  </template>
                </q-select>
              </div>
            </div>
          </div>

          <!-- Country And City -->

          <div class="row justify-between items-center q-my-md">
            <div class="col-6 q-px-sm row">
              <div class="col-6 q-pr-sm">
                <div class="text-grey-7">
                  <span>کشور </span>
                </div>

                <div class="q-pt-sm full-width">
                  <q-select
                    v-model="country"
                    :options="countryOptions"
                    color="primary"
                    outlined
                    clearable
                    use-input
                    use-chips
                    stack-label
                    @filter="filterCountry"
                    input-debounce="0"
                  >
                    <template v-slot:selected>
                      <div v-if="country">
                        <div
                          class="q-pa-sm br-4"
                          style="background: #e0e0e0 !important"
                        >
                          {{ country }}
                        </div>
                      </div>
                    </template>
                  </q-select>
                </div>
              </div>

              <div class="col-6 q-pl-sm">
                <div class="text-grey-7">
                  <span>شهر </span>
                </div>

                <div class="q-pt-sm full-width">
                  <q-select
                    v-model="city"
                    :options="cityOptions"
                    color="primary"
                    outlined
                    clearable
                    use-input
                    use-chips
                    stack-label
                    @filter="filterCity"
                    input-debounce="0"
                  >
                    <template v-slot:selected>
                      <div v-if="city">
                        <div
                          class="q-pa-sm br-4"
                          style="background: #e0e0e0 !important"
                        >
                          {{ city }}
                        </div>
                      </div>
                    </template>
                  </q-select>
                </div>
              </div>
            </div>

            <div class="col-6 q-px-sm flex justify-end q-pt-sm">
              <div class="col-6 q-px-sm row" style="direction: ltr">
                <div class="col-6 q-pl-sm">
                  <div class="text-grey-7">
                    <span>Country </span>
                  </div>

                  <div class="full-width">
                    <q-select
                      v-model="enCountry"
                      :options="enCountryOptions"
                      color="primary"
                      outlined
                      clearable
                      use-input
                      use-chips
                      stack-label
                      @filter="filterENCountry"
                      input-debounce="0"
                    >
                      <template v-slot:selected>
                        <div v-if="enCountry">
                          <div
                            class="q-pa-sm br-4"
                            style="background: #e0e0e0 !important"
                          >
                            {{ enCountry }}
                          </div>
                        </div>
                      </template>
                    </q-select>
                  </div>
                </div>

                <div class="col-6 q-pr-sm">
                  <div class="text-grey-7">
                    <span>City </span>
                  </div>

                  <div class="full-width">
                    <q-select
                      v-model="enCity"
                      :options="enCityOptions"
                      color="primary"
                      outlined
                      clearable
                      use-input
                      use-chips
                      stack-label
                      @filter="filterENCity"
                      input-debounce="0"
                    >
                      <template v-slot:selected>
                        <div v-if="enCity">
                          <div
                            class="q-pa-sm br-4"
                            style="background: #e0e0e0 !important"
                          >
                            {{ enCity }}
                          </div>
                        </div>
                      </template>
                    </q-select>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Start Month And Year -->

          <div class="row justify-between items-center q-my-md">
            <div class="col-6 q-px-sm row">
              <div class="col-6 q-pr-sm">
                <div class="text-grey-7">
                  <span>ماه شروع </span>
                </div>

                <div class="q-pt-sm full-width">
                  <q-select
                    v-model="fromMonth"
                    :options="fromMonthOptions"
                    color="primary"
                    outlined
                    clearable
                    use-input
                    use-chips
                    stack-label
                    @filter="filterFromMonth"
                    input-debounce="0"
                  >
                    <template v-slot:selected>
                      <div v-if="fromMonth">
                        <div
                          class="q-pa-sm br-4"
                          style="background: #e0e0e0 !important"
                        >
                          {{ fromMonth }}
                        </div>
                      </div>
                    </template>
                  </q-select>
                </div>
              </div>

              <div class="col-6 q-pl-sm">
                <div class="text-grey-7">
                  <span>سال شروع </span>
                </div>

                <div class="q-pt-sm full-width">
                  <q-select
                    v-model="fromYear"
                    :options="fromYearOptions"
                    color="primary"
                    outlined
                    clearable
                    use-input
                    use-chips
                    stack-label
                    @filter="filterFromYear"
                    input-debounce="0"
                  >
                    <template v-slot:selected>
                      <div v-if="fromYear">
                        <div
                          class="q-pa-sm br-4"
                          style="background: #e0e0e0 !important"
                        >
                          {{ fromYear }}
                        </div>
                      </div>
                    </template>
                  </q-select>
                </div>
              </div>
            </div>

            <div class="col-6 q-px-sm flex justify-end q-pt-sm">
              <div class="col-6 q-px-sm row" style="direction: ltr">
                <div class="col-6 q-pl-sm">
                  <div class="text-grey-7">
                    <span>From Month </span>
                  </div>

                  <div class="full-width">
                    <q-select
                      v-model="enFromMonth"
                      :options="enFromMonthOptions"
                      color="primary"
                      outlined
                      clearable
                      use-input
                      use-chips
                      stack-label
                      @filter="filterENFromMonth"
                      input-debounce="0"
                    >
                      <template v-slot:selected>
                        <div v-if="enFromMonth">
                          <div
                            class="q-pa-sm br-4"
                            style="background: #e0e0e0 !important"
                          >
                            {{ enFromMonth }}
                          </div>
                        </div>
                      </template>
                    </q-select>
                  </div>
                </div>

                <div class="col-6 q-pr-sm">
                  <div class="text-grey-7">
                    <span>From Year </span>
                  </div>

                  <div class="full-width">
                    <q-select
                      v-model="enFromYear"
                      :options="enFromYearOptions"
                      color="primary"
                      outlined
                      clearable
                      use-input
                      use-chips
                      stack-label
                      @filter="filterENFromYear"
                      input-debounce="0"
                    >
                      <template v-slot:selected>
                        <div v-if="enFromYear">
                          <div
                            class="q-pa-sm br-4"
                            style="background: #e0e0e0 !important"
                          >
                            {{ enFromYear }}
                          </div>
                        </div>
                      </template>
                    </q-select>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- End Month And Year -->

          <div
            v-if="!currentJob"
            class="row justify-between items-center q-my-md"
          >
            <div class="col-6 q-px-sm row">
              <div class="col-6 q-pr-sm">
                <div class="text-grey-7">
                  <span>ماه پایان </span>
                </div>

                <div class="q-pt-sm full-width">
                  <q-select
                    v-model="toMonth"
                    :options="toMonthOptions"
                    color="primary"
                    outlined
                    clearable
                    use-input
                    use-chips
                    stack-label
                    @filter="filterToMonth"
                    input-debounce="0"
                  >
                    <template v-slot:selected>
                      <div v-if="toMonth">
                        <div
                          class="q-pa-sm br-4"
                          style="background: #e0e0e0 !important"
                        >
                          {{ toMonth }}
                        </div>
                      </div>
                    </template>
                  </q-select>
                </div>
              </div>

              <div class="col-6 q-pl-sm">
                <div class="text-grey-7">
                  <span>سال پایان </span>
                </div>

                <div class="q-pt-sm full-width">
                  <q-select
                    v-model="toYear"
                    :options="toYearOptions"
                    color="primary"
                    outlined
                    clearable
                    use-input
                    use-chips
                    stack-label
                    @filter="filterToYear"
                    input-debounce="0"
                  >
                    <template v-slot:selected>
                      <div v-if="toYear">
                        <div
                          class="q-pa-sm br-4"
                          style="background: #e0e0e0 !important"
                        >
                          {{ toYear }}
                        </div>
                      </div>
                    </template>
                  </q-select>
                </div>
              </div>
            </div>

            <div class="col-6 q-px-sm flex justify-end q-pt-sm">
              <div class="col-6 q-px-sm row" style="direction: ltr">
                <div class="col-6 q-pl-sm">
                  <div class="text-grey-7">
                    <span>To Month </span>
                  </div>

                  <div class="full-width">
                    <q-select
                      v-model="enToMonth"
                      :options="enToMonthOptions"
                      color="primary"
                      outlined
                      clearable
                      use-input
                      use-chips
                      stack-label
                      @filter="filterENToMonth"
                      input-debounce="0"
                    >
                      <template v-slot:selected>
                        <div v-if="enToMonth">
                          <div
                            class="q-pa-sm br-4"
                            style="background: #e0e0e0 !important"
                          >
                            {{ enToMonth }}
                          </div>
                        </div>
                      </template>
                    </q-select>
                  </div>
                </div>

                <div class="col-6 q-pr-sm">
                  <div class="text-grey-7">
                    <span>To Year </span>
                  </div>

                  <div class="full-width">
                    <q-select
                      v-model="enToYear"
                      :options="enToYearOptions"
                      color="primary"
                      outlined
                      clearable
                      use-input
                      use-chips
                      stack-label
                      @filter="filterENToYear"
                      input-debounce="0"
                    >
                      <template v-slot:selected>
                        <div v-if="enToYear">
                          <div
                            class="q-pa-sm br-4"
                            style="background: #e0e0e0 !important"
                          >
                            {{ enToYear }}
                          </div>
                        </div>
                      </template>
                    </q-select>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Current Job -->

          <div class="row justify-between items-center q-my-md">
            <div class="col-6 q-px-sm">
              <div class="text-grey-7">
                <q-checkbox v-model="currentJob" />

                <span> هنوز در این شرکت مشغول به کار هستم. </span>
              </div>
            </div>

            <div class="col-6 q-px-sm flex justify-end q-pt-sm">
              <div class="text-grey-7">
                <q-checkbox v-model="currentJob" />

                <span>It is my current job </span>
              </div>
            </div>
          </div>

          <!-- Achievements -->

          <div class="row justify-between items-center q-my-md">
            <div class="col-6 q-px-sm">
              <div class="text-grey-7">
                <span>دستاورد‌ها و وظایف کلیدی (اختیاری)</span>

                <q-btn flat color="primary" dense icon="info">
                  <q-tooltip
                    anchor="center left"
                    self="center right"
                    class="bg-blue-9 br-8"
                    style="width: 175px; font-size: 13px"
                  >
                    مثلا زمینه فعالیت شغل حسابدار،مالی و حسابداری می باشد
                  </q-tooltip>
                </q-btn>
              </div>

              <div class="q-pt-sm full-width">
                <q-input
                  maxlength="3000"
                  counter
                  v-model="achievements"
                  outlined
                  type="textarea"
                />
              </div>
            </div>

            <div class="col-6 q-px-sm flex justify-end q-mt-sm">
              <div class="text-grey-7">
                <span>Achievements (Optional) </span>
              </div>

              <div class="q-pt-sm full-width">
                <q-input
                  maxlength="3000"
                  counter
                  v-model="enAchievements"
                  outlined
                  type="textarea"
                />
              </div>
            </div>
          </div>
        </div>

        <div
          class="full-width bg-white q-pa-md text-right"
          style="position: sticky; bottom: 0"
        >
          <div class="q-mt-md">
            <q-btn flat color="grey-7" unelevated label="انصراف" />

            <q-btn color="primary" unelevated label="ذخیره تغییرات" />
          </div>
        </div>
      </div>
    </q-dialog>

    <!-- Add Language And Level Dialog -->

    <q-dialog v-model="addLang">
      <div class="bg-white" style="width: 600px !important">
        <div
          class="full-width relative-position row justify-center"
          style="height: 45px"
        >
          <div class="absolute-right q-pt-sm">
            <q-btn flat color="grey-6" @click="addLang = false">
              <q-icon name="cancel" size="32px" />
            </q-btn>
          </div>

          <div class="absolute-center text-h6 text-bold">افزودن زبان</div>
        </div>

        <div class="q-pa-md">
          <!-- Language -->

          <div class="row justify-between items-center q-my-md">
            <div class="col-6 q-px-sm">
              <div class="text-grey-7">
                <span>زبان </span>
              </div>

              <div class="q-pt-sm full-width">
                <q-select
                  v-model="lang"
                  :options="langOptions"
                  color="primary"
                  outlined
                  clearable
                  use-input
                  use-chips
                  stack-label
                  @filter="filterLang"
                  input-debounce="0"
                >
                  <template v-slot:selected>
                    <div v-if="lang">
                      <div
                        class="q-pa-sm br-4"
                        style="background: #e0e0e0 !important"
                      >
                        {{ lang }}
                      </div>
                    </div>
                  </template>
                </q-select>
              </div>
            </div>

            <div class="col-6 q-px-sm flex justify-end">
              <div class="text-grey-7">
                <span>Language</span>
              </div>

              <div class="q-pt-sm full-width" style="direction: ltr">
                <q-select
                  v-model="enLang"
                  :options="enLangOptions"
                  color="primary"
                  outlined
                  clearable
                  use-input
                  use-chips
                  stack-label
                  @filter="filterENLang"
                  input-debounce="0"
                >
                  <template v-slot:selected>
                    <div v-if="enLang">
                      <div
                        class="q-pa-sm br-4"
                        style="background: #e0e0e0 !important"
                      >
                        {{ enLang }}
                      </div>
                    </div>
                  </template>
                </q-select>
              </div>
            </div>
          </div>

          <!-- Level -->

          <div class="row justify-between items-center q-my-md">
            <div class="col-6 q-px-sm">
              <div class="text-grey-7">
                <span>سطح مهارت </span>
              </div>

              <div class="q-pt-sm full-width">
                <q-select
                  v-model="langSkill"
                  :options="langSkillOptions"
                  color="primary"
                  outlined
                  clearable
                  use-input
                  use-chips
                  stack-label
                  @filter="filterLangSkill"
                  input-debounce="0"
                >
                  <template v-slot:selected>
                    <div v-if="langSkill">
                      <div
                        class="q-pa-sm br-4"
                        style="background: #e0e0e0 !important"
                      >
                        {{ langSkill }}
                      </div>
                    </div>
                  </template>
                </q-select>
              </div>
            </div>

            <div class="col-6 q-px-sm flex justify-end">
              <div class="text-grey-7">
                <span>Skill Level</span>
              </div>

              <div class="q-pt-sm full-width" style="direction: ltr">
                <q-select
                  v-model="enLangSkill"
                  :options="enLangSkillOptions"
                  color="primary"
                  outlined
                  clearable
                  use-input
                  use-chips
                  stack-label
                  @filter="filterENLangSkill"
                  input-debounce="0"
                >
                  <template v-slot:selected>
                    <div v-if="enLangSkill">
                      <div
                        class="q-pa-sm br-4"
                        style="background: #e0e0e0 !important"
                      >
                        {{ enLangSkill }}
                      </div>
                    </div>
                  </template>
                </q-select>
              </div>
            </div>
          </div>
        </div>

        <div
          class="full-width bg-white q-pa-md text-right"
          style="position: sticky; bottom: 0"
        >
          <div class="q-mt-md">
            <q-btn flat color="grey-7" unelevated label="انصراف" />

            <q-btn color="primary" unelevated label="ذخیره تغییرات" />
          </div>
        </div>
      </div>
    </q-dialog>

    <!-- Add Application Dialog -->

    <q-dialog v-model="addApplication">
      <div class="bg-white" style="width: 800px !important; height: 530px">
        <div
          class="full-width relative-position row justify-center"
          style="height: 45px"
        >
          <div class="absolute-right q-pt-sm">
            <q-btn flat color="grey-6" @click="addApplication = false">
              <q-icon name="cancel" size="32px" />
            </q-btn>
          </div>

          <div class="absolute-center text-h6 text-bold">افزودن نرم افزار</div>
        </div>

        <div class="q-px-lg">
          <!-- Applications -->

          <div class="full-width">
            <div class="col-12 row q-my-lg">
              <div class="q-mr-md row items-center q-mt-sm">
                <div>
                  <div
                    class="text-white row q-px-sm q-py-xs br-8"
                    style="
                      background-color: #5c6573 !important;
                      padding-top: 5px;
                      padding-bottom: 5px;
                    "
                  >
                    <q-icon
                      size="20px"
                      class="q-px-xs"
                      color="grey-5"
                      name="delete"
                    />

                    <div class="text-bold q-ml-sm" style="font-size: 13px">
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

              <div class="q-mr-md row items-center q-mt-sm">
                <div>
                  <div
                    class="text-white row q-px-sm q-py-xs br-8"
                    style="
                      background-color: #5c6573 !important;
                      padding-top: 5px;
                      padding-bottom: 5px;
                    "
                  >
                    <q-icon
                      size="20px"
                      class="q-px-xs"
                      color="grey-5"
                      name="delete"
                    />

                    <div class="text-bold q-ml-sm" style="font-size: 13px">
                      VueJS
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

              <div class="q-mr-md row items-center q-mt-sm">
                <div>
                  <div
                    class="text-white row q-px-sm q-py-xs br-8"
                    style="
                      background-color: #5c6573 !important;
                      padding-top: 5px;
                      padding-bottom: 5px;
                    "
                  >
                    <q-icon
                      size="20px"
                      class="q-px-xs"
                      color="grey-5"
                      name="delete"
                    />

                    <div class="text-bold q-ml-sm" style="font-size: 13px">
                      Figma
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

              <div class="q-mr-md row items-center q-mt-sm">
                <div>
                  <div
                    class="text-white row q-px-sm q-py-xs br-8"
                    style="
                      background-color: #5c6573 !important;
                      padding-top: 5px;
                      padding-bottom: 5px;
                    "
                  >
                    <q-icon
                      size="20px"
                      class="q-px-xs"
                      color="grey-5"
                      name="delete"
                    />

                    <div class="text-bold q-ml-sm" style="font-size: 13px">
                      Laravel
                    </div>

                    <q-separator
                      color="white"
                      class="q-mx-sm q-my-xs"
                      vertical
                    />

                    <div>متوسط</div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div>
            <q-input
              outlined
              clearable
              v-model="searchApp"
              placeholder="جستجوی نرم افزار"
            >
              <template v-slot:prepend>
                <q-icon name="search" />
              </template>
            </q-input>
          </div>
        </div>

        <div class="q-mx-lg">
          <div
            class="full-width br-10 q-my-md"
            v-if="searchApp == ''"
            style="background: #f4f4f4"
            @click="openList = true"
          >
            <q-btn-dropdown
              color="black"
              class="q-py-md"
              flat
              unelevated
              label="نرم افزار های آفیس"
              v-model="openList"
            >
              <q-list style="width: 235px; height: 240px">
                <q-item
                  class="q-py-sm"
                  clickable
                  v-close-popup
                  @click="onItemClick"
                >
                  <q-item-section>
                    <q-item-label>نرم افزارهای آفیس</q-item-label>
                  </q-item-section>
                </q-item>

                <q-separator inset />

                <q-item
                  class="q-py-sm"
                  clickable
                  v-close-popup
                  @click="onItemClick"
                >
                  <q-item-section>
                    <q-item-label
                      >نرم افزارها و زبان های برنامه نویسی /
                      DevOps</q-item-label
                    >
                  </q-item-section>
                </q-item>

                <q-separator inset />

                <q-item
                  class="q-py-sm"
                  clickable
                  v-close-popup
                  @click="onItemClick"
                >
                  <q-item-section>
                    <q-item-label>شبکه و سخت افزار / سیستم عامل</q-item-label>
                  </q-item-section>
                </q-item>

                <q-separator inset />

                <q-item
                  class="q-py-sm"
                  clickable
                  v-close-popup
                  @click="onItemClick"
                >
                  <q-item-section>
                    <q-item-label>طراحی گرافیک / طراحی محصول</q-item-label>
                  </q-item-section>
                </q-item>

                <q-separator inset />

                <q-item
                  class="q-py-sm"
                  clickable
                  v-close-popup
                  @click="onItemClick"
                >
                  <q-item-section>
                    <q-item-label
                      >نرم افزارهای مهندسی برق و مهندسی پزشکی</q-item-label
                    >
                  </q-item-section>
                </q-item>

                <q-separator inset />

                <q-item
                  class="q-py-sm"
                  clickable
                  v-close-popup
                  @click="onItemClick"
                >
                  <q-item-section>
                    <q-item-label
                      >نرم افزارهای مهندسی مکانیک و هوافضا</q-item-label
                    >
                  </q-item-section>
                </q-item>

                <q-separator inset />

                <q-item
                  class="q-py-sm"
                  clickable
                  v-close-popup
                  @click="onItemClick"
                >
                  <q-item-section>
                    <q-item-label>نرم افزارهای مهندسی معدن و مواد</q-item-label>
                  </q-item-section>
                </q-item>

                <q-separator inset />
              </q-list>
            </q-btn-dropdown>

            <q-separator inset />

            <div class="q-py-md row">
              <div class="addApplicationCards q-ma-xs">
                <span> Microsoft Word</span>

                <q-icon name="add" class="q-pl-sm" size="22px" />
              </div>

              <div class="addApplicationCards q-ma-xs">
                <span> Microsoft Excel</span>

                <q-icon name="add" class="q-pl-sm" size="22px" />
              </div>

              <div class="addApplicationCards q-ma-xs">
                <span> Microsoft Access</span>

                <q-icon name="add" class="q-pl-sm" size="22px" />
              </div>

              <div class="addApplicationCards q-ma-xs">
                <span> Microsoft Powerpoint</span>

                <q-icon name="add" class="q-pl-sm" size="22px" />
              </div>

              <div class="addApplicationCards q-ma-xs">
                <span> Microsoft Visio</span>

                <q-icon name="add" class="q-pl-sm" size="22px" />
              </div>

              <div class="addApplicationCards q-ma-xs">
                <span> Microsoft Project</span>

                <q-icon name="add" class="q-pl-sm" size="22px" />
              </div>

              <div class="addApplicationCards q-ma-xs">
                <span> Microsoft One Note</span>

                <q-icon name="add" class="q-pl-sm" size="22px" />
              </div>

              <div class="addApplicationCards q-ma-xs">
                <span> Microsoft Outlook</span>

                <q-icon name="add" class="q-pl-sm" size="22px" />
              </div>

              <div class="addApplicationCards q-ma-xs">
                <span> MathType</span>

                <q-icon name="add" class="q-pl-sm" size="22px" />
              </div>
            </div>
          </div>
        </div>

        <div
          class="full-width bg-white q-pa-md text-right"
          style="position: sticky; bottom: 0"
        >
          <div class="q-mt-md">
            <q-btn flat color="grey-7" unelevated label="انصراف" />

            <q-btn color="primary" unelevated label="ذخیره تغییرات" />
          </div>
        </div>
      </div>
    </q-dialog>
  </q-page>
</template>

<script>
import { useQuasar } from "quasar";
import { onMounted, reactive, ref, toRefs } from "vue";

export default {
  setup() {
    const $q = useQuasar();
    const link = ref("jobvision.ir/cv/83836552-092743");
    const title = ref("دولوپر فول استک در شرکت آیترونیک");
    const linkedin = ref();
    const gender = ref("male");
    const maritalStatus = ref("single");
    const militaryService = ref();
    const city = ref();
    const cityOptions = ref([
      "Google",
      "Facebook",
      "Twitter",
      "Apple",
      "Oracle",
    ]);
    const region = ref();
    const birth = ref();
    const number = ref();
    const expectedSalary = ref();
    const jobCategory = ref();
    const jobOptions = ref([
      "Google",
      "Facebook",
      "Twitter",
      "Apple",
      "Oracle",
    ]);
    const jobTitle = ref();
    const whatJobCategory = ref();
    const whatJobOptions = ref([
      "Google",
      "Facebook",
      "Twitter",
      "Apple",
      "Oracle",
    ]);
    const seniorityLevel = ref();
    const seniorityLevelOptions = ref([
      "Google",
      "Facebook",
      "Twitter",
      "Apple",
      "Oracle",
    ]);
    const companyName = ref();
    const industry = ref();
    const industryOptions = ref([
      "Google",
      "Facebook",
      "Twitter",
      "Apple",
      "Oracle",
    ]);
    const country = ref();
    const countryOptions = ref([
      "Google",
      "Facebook",
      "Twitter",
      "Apple",
      "Oracle",
    ]);
    const fromMonth = ref();
    const fromMonthOptions = ref([
      "Google",
      "Facebook",
      "Twitter",
      "Apple",
      "Oracle",
    ]);
    const fromYear = ref();
    const fromYearOptions = ref([
      "Google",
      "Facebook",
      "Twitter",
      "Apple",
      "Oracle",
    ]);
    const toMonth = ref();
    const toMonthOptions = ref([
      "Google",
      "Facebook",
      "Twitter",
      "Apple",
      "Oracle",
    ]);
    const toYear = ref();
    const toYearOptions = ref([
      "Google",
      "Facebook",
      "Twitter",
      "Apple",
      "Oracle",
    ]);
    const achievements = ref();
    const lang = ref();
    const langOptions = ref([
      "Google",
      "Facebook",
      "Twitter",
      "Apple",
      "Oracle",
    ]);
    const langSkill = ref();
    const langSkillOptions = ref([
      "Google",
      "Facebook",
      "Twitter",
      "Apple",
      "Oracle",
    ]);
    const searchApp = ref("");

    const en = reactive({
      enTitle: "Full Stack Develeoper at Aytronic",
      enMilitaryService: "",
      enCityOptions: ["Google", "Facebook", "Twitter", "Apple", "Oracle"],
      enBirth: "",
    });

    // Dialogs Names

    const share = ref(false);
    const editAbout = ref(false);
    const information = ref(false);
    const createWorkExperience = ref(false);
    const openList = ref(false);

    // Dialogs Content

    const editPicture = ref(false);
    const showBirth = ref(false);
    const showCalender = ref(false);
    const showENCalender = ref(false);
    const foreigner = ref(false);
    const disability = ref(false);
    const currentJob = ref(false);
    const addLang = ref(false);
    const addApplication = ref(false);

    function copyLink() {
      navigator.clipboard.writeText(link.value);

      $q.notify({
        group: false,
        avatar: "https://jobvision.ir/assets/images/toasts/success.svg",
        position: "top-left",
        message: "لینک کپی شد",
        color: "dark",
        actions: [{ icon: "close", color: "white" }],
      });
    }

    function getDate() {
      var currentdate = new Date();

      var dateTime =
        currentdate.getFullYear() +
        "/" +
        (currentdate.getMonth() + 1) +
        "/" +
        currentdate.getDate();

      birth.value = dateTime;
    }

    onMounted(() => {
      getDate();
    });

    return {
      en,
      link,
      city,
      lang,
      title,
      share,
      birth,
      gender,
      number,
      region,
      toYear,
      addLang,
      toMonth,
      getDate,
      country,
      industry,
      jobTitle,
      fromYear,
      linkedin,
      copyLink,
      openList,
      searchApp,
      fromMonth,
      foreigner,
      showBirth,
      langSkill,
      editAbout,
      disability,
      jobOptions,
      currentJob,
      cityOptions,
      information,
      jobCategory,
      companyName,
      editPicture,
      langOptions,
      achievements,
      showCalender,
      toYearOptions,
      maritalStatus,
      countryOptions,
      seniorityLevel,
      whatJobOptions,
      showENCalender,
      expectedSalary,
      toMonthOptions,
      addApplication,
      fromYearOptions,
      militaryService,
      whatJobCategory,
      industryOptions,
      fromMonthOptions,
      langSkillOptions,
      createWorkExperience,
      seniorityLevelOptions,

      filterFn(val, update) {
        update(() => {
          const needle = val.toLowerCase();
          cityOptions.value = cityOptions.value.filter(
            (v) => v.toLowerCase().indexOf(needle) > -1
          );
        });
      },

      filterJobs(val, update) {
        update(() => {
          const needle = val.toLowerCase();
          jobOptions.value = jobOptions.value.filter(
            (v) => v.toLowerCase().indexOf(needle) > -1
          );
        });
      },

      filterWhatJobs(val, update) {
        update(() => {
          const needle = val.toLowerCase();
          whatJobOptions.value = whatJobOptions.value.filter(
            (v) => v.toLowerCase().indexOf(needle) > -1
          );
        });
      },

      filterSeniorityLevel(val, update) {
        update(() => {
          const needle = val.toLowerCase();
          seniorityLevelOptions.value = seniorityLevelOptions.value.filter(
            (v) => v.toLowerCase().indexOf(needle) > -1
          );
        });
      },

      filterFromMonth(val, update) {
        update(() => {
          const needle = val.toLowerCase();
          fromMonthOptions.value = fromMonthOptions.value.filter(
            (v) => v.toLowerCase().indexOf(needle) > -1
          );
        });
      },

      filterFromYear(val, update) {
        update(() => {
          const needle = val.toLowerCase();
          fromYearOptions.value = fromYearOptions.value.filter(
            (v) => v.toLowerCase().indexOf(needle) > -1
          );
        });
      },

      filterToMonth(val, update) {
        update(() => {
          const needle = val.toLowerCase();
          toMonthOptions.value = toMonthOptions.value.filter(
            (v) => v.toLowerCase().indexOf(needle) > -1
          );
        });
      },

      filterToYear(val, update) {
        update(() => {
          const needle = val.toLowerCase();
          toYearOptions.value = toYearOptions.value.filter(
            (v) => v.toLowerCase().indexOf(needle) > -1
          );
        });
      },

      filterLang(val, update) {
        update(() => {
          const needle = val.toLowerCase();
          langOptions.value = langOptions.value.filter(
            (v) => v.toLowerCase().indexOf(needle) > -1
          );
        });
      },

      filterLangSkill(val, update) {
        update(() => {
          const needle = val.toLowerCase();
          langSkillOptions.value = langSkillOptions.value.filter(
            (v) => v.toLowerCase().indexOf(needle) > -1
          );
        });
      },

      ...toRefs(en),
    };
  },
};
</script>

<style scoped>
:deep(.input-box .q-field__control),
:deep(.input-box .q-field__marginal) {
  height: 45px !important;
}

.q-dialog__inner--minimized > div {
  max-width: none !important;
}

.active-tab {
  border-bottom: 3px solid;
  border-color: #5660f2 !important;
  border-bottom-right-radius: 0px !important;
  border-bottom-left-radius: 0px !important;
}

.gender-section {
  border: 1px solid #eef0f4;
  border-radius: 4px;
  padding: 0rem 0.7rem;
}

.q-date {
  box-shadow: none !important;
}

.addApplicationCards {
  background: white;
  border-radius: 40px;
  padding: 10px 16px;
  border: 1px solid #e0e0e0;
}
</style>
