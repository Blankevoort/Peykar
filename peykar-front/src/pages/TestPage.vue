<template>
  <q-page>
    <div>
      <q-btn label="toggle share" no-caps @click="share = true" />

      <q-btn label="toggle about me" no-caps @click="editAboutForm = true" />

      <q-btn
        label="toggle picture change"
        no-caps
        @click="editPicture = true"
      />

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

      <q-btn label="toggle lang" no-caps @click="addLangDialog = true" />

      <q-btn
        label="toggle add application"
        no-caps
        @click="addApplication = true"
      />
    </div>

    <!-- Forms And Dialogs -->

    <!-- Profile Link Dialog - Responsive -->

    <q-dialog v-model="share">
      <div class="relative-position bg-white q-pa-md" style="width: 600px">
        <div class="absolute-right q-pt-xs">
          <q-btn flat color="grey-6" icon="cancel" @click="share = false" />
        </div>

        <div class="full-width q-my-md">
          <span class="text-grey-7">آدرس یکتا رزومه شما</span>

          <div class="row justify-between q-my-sm q-px-xs">
            <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9 col-xl-9 q-mt-sm">
              <q-input
                class="input-box"
                outlined
                color="grey-5"
                v-model="shareLink"
              />
            </div>

            <div
              class="col-xs-12 col-sm-3 col-md-3 col-lg-3 col-xl-3 q-pl-md q-mt-sm text-center"
            >
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

    <!-- Change About Me Dialog - Responsive -->

    <q-dialog v-model="editAboutForm">
      <!-- Medium+ Content -->

      <div class="bg-white q-pa-md gt-sm" style="width: 800px !important">
        <div
          class="full-width relative-position row justify-center"
          style="height: 45px"
        >
          <div class="absolute-right q-pt-sm">
            <q-btn flat color="grey-6" @click="editAboutForm = false">
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
                  <div class="text-h6 text-bold gt-sm">تصویر پروفایل</div>

                  <div class="font-13 text-bold lt-md">تصویر پروفایل</div>

                  <div class="text-grey-7 q-pb-sm">
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

                <q-input outlined v-model="editAboutTitle" />
              </div>

              <div class="col-6 q-px-sm q-mt-sm">
                <div class="text-grey-7 q-pb-sm">Job Title</div>

                <q-input
                  class="full-width"
                  outlined
                  v-model="enEditAboutTitle"
                />
              </div>
            </div>
          </div>

          <div class="q-my-md">
            <div class="full-width flex items-center">
              <div class="q-pb-sm text-grey-7">آدرس پروفایل لینکدین شما</div>

              <q-input
                outlined
                v-model="editAboutLinkedin"
                class="full-width"
              />
            </div>
          </div>

          <div>
            <div class="row justify-between items-center">
              <div class="col-6 q-px-sm">
                <div class="text-grey-7 row justify-between">
                  <span class="q-pb-sm">چند جمله درباره خود بنویسید</span>

                  <span class="q-pb-sm">xxxx / 1000</span>
                </div>

                <q-input
                  outlined
                  type="textarea"
                  v-model="editAboutDescription"
                />
              </div>

              <div class="col-6 q-px-sm">
                <div class="text-grey-7 full-width row justify-between">
                  <span class="q-pb-sm">xxxx / 1000</span>

                  <span class="q-pb-sm">Describe Yourself</span>
                </div>

                <q-input
                  class="full-width"
                  outlined
                  type="textarea"
                  v-model="enEditAboutDescription"
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

      <!-- Medium- Content -->

      <div class="bg-white lt-md" style="width: 600px !important">
        <div>
          <div
            class="full-width relative-position row justify-center"
            style="height: 45px"
          >
            <div class="absolute-right q-pt-sm">
              <q-btn flat color="grey-6" @click="editAboutForm = false">
                <q-icon name="cancel" size="32px" />
              </q-btn>
            </div>

            <div class="absolute-center text-bold font-13">
              ویرایش درباره من
            </div>
          </div>

          <div class="flex justify-center">
            <div class="q-my-sm" style="max-width: 240px">
              <q-tabs
                class="active-forms-tab-parent"
                active-class="active-forms-tab"
                indicator-color="transparent"
                v-model="editAboutTabs"
                no-caps
              >
                <q-tab name="persian" label="فارسی" />
                <q-tab name="english" label="انگلیسی" />
              </q-tabs>
            </div>
          </div>

          <q-separator />
        </div>

        <q-tab-panels v-model="editAboutTabs">
          <q-tab-panel name="persian">
            <div class="q-pa-md">
              <div class="q-pt-sm">
                <div
                  class="col-xs-12 col-sm-7 col-md-7 col-lg-7 col-xl-7 q-mt-sm row"
                >
                  <q-avatar size="69px">
                    <q-img
                      src="https://fileapi.jobvision.ir/StaticFiles/Candidate/DefaultImages/default-user-Male.png?v=20231122"
                    />
                  </q-avatar>

                  <div class="col-8 q-pl-md">
                    <div>تصویر پروفایل</div>

                    <div class="text-grey-7 q-pb-sm">
                      ‌فرمت‌های JPG, PNG, SVG, JPEG(حداکثر ۵١۲ کیلوبایت)
                    </div>
                  </div>
                </div>

                <div
                  class="col-xs-12 col-sm-5 col-md-5 col-lg-5 col-xl-5 text-center q-mt-sm"
                >
                  <q-btn
                    class="text-bold"
                    flat
                    color="primary"
                    label="بارگذاری تصویر پروفایل"
                    icon="upload"
                  />
                </div>
              </div>

              <div class="q-mt-md q-mb-sm">
                <div class="q-px-sm">
                  <div class="row">
                    <div class="q-pb-sm text-grey-7">عنوان شغلی نمایشی</div>

                    <q-btn class="q-pb-md" flat color="grey-7" dense>
                      <q-icon name="info" size="14px" />
                      <q-tooltip
                        anchor="center left"
                        self="center right"
                        class="bg-blue-9 br-8"
                        style="width: 175px; font-size: 13px"
                      >
                        در اینجا می توانید عنوان شغلی نمایشی خود برای کارفرما را
                        وارد کنید.
                      </q-tooltip>
                    </q-btn>
                  </div>

                  <q-input
                    outlined
                    v-model="editAboutTitle"
                    class="full-width"
                  />
                </div>
              </div>

              <div class="q-my-md q-px-sm">
                <div class="full-width flex items-center">
                  <div class="q-pb-sm text-grey-7">
                    آدرس پروفایل لینکدین شما
                  </div>

                  <q-input
                    outlined
                    v-model="editAboutLinkedin"
                    class="full-width"
                  />
                </div>
              </div>

              <div>
                <div class="q-px-sm">
                  <div class="text-grey-7 q-pb-sm">
                    <span>چند جمله درباره خود بنویسید</span>
                  </div>

                  <q-input
                    counter
                    outlined
                    type="textarea"
                    v-model="editAboutDescription"
                  />
                </div>
              </div>
            </div>
          </q-tab-panel>

          <q-tab-panel name="english" style="direction: ltr">
            <div class="q-pa-md">
              <div class="q-mt-md q-mb-sm">
                <div class="q-px-sm q-mt-sm">
                  <div class="text-grey-7 q-pb-sm">Job Title</div>

                  <q-input
                    class="full-width"
                    outlined
                    v-model="enEditAboutTitle"
                  />
                </div>
              </div>

              <div>
                <div class="q-px-sm">
                  <div class="text-grey-7 q-pb-sm">
                    <span>Describe Yourself</span>
                  </div>

                  <q-input
                    counter
                    class="full-width"
                    outlined
                    type="textarea"
                    v-model="enEditAboutDescription"
                  />
                </div>
              </div>
            </div>
          </q-tab-panel>
        </q-tab-panels>

        <div
          class="full-width relative-position form-buttons flex justify-center items-center"
        >
          <div>
            <q-btn flat color="grey-7" label="انصراف" />

            <q-btn color="primary" label="ذخیره تغییرات" />
          </div>
        </div>
      </div>
    </q-dialog>

    <!-- Change Profile Picture Dialog - Responsive -->

    <q-dialog v-model="editPicture">
      <div class="bg-white q-pa-md" style="width: 600px !important">
        <div class="full-width relative-position row" style="height: 45px">
          <div class="absolute-right q-pt-sm">
            <q-btn flat color="grey-6" @click="editPicture = false">
              <q-icon name="cancel" size="32px" />
            </q-btn>
          </div>

          <div class="text-h6 text-bold gt-sm">تصویر پروفایل</div>

          <div class="font-13 text-bold lt-md">تصویر پروفایل</div>
        </div>

        <div class="text-center q-pa-md">
          <q-avatar size="180px">
            <q-img
              src="https://fileapi.jobvision.ir/StaticFiles/Candidate/DefaultImages/default-user-Male.png?v=20231122"
            >
              <div
                class="absolute flex items-center justify-center"
                style="background-color: #acacac70; height: 100%"
              >
                <div>
                  <q-btn
                    flat
                    color="white"
                    label="بارگذاری تصویر"
                    icon="upload"
                  />
                </div>
              </div>
            </q-img>
          </q-avatar>

          <div class="q-mt-md text-grey-7">
            فرمت‌های JPG, PNG, SVG, JPEG(حداکثر ۵١۲ کیلوبایت)
          </div>
        </div>

        <div class="q-pb-md full-width">
          <q-separator />
        </div>

        <div class="full-width text-right gt-sm">
          <q-btn color="primary" label="ذخیره تغییرات" />
        </div>

        <div class="full-width text-center lt-md">
          <q-btn color="primary" label="ذخیره تغییرات" />
        </div>
      </div>
    </q-dialog>

    <!-- Basic Information Dialog - Responsive -->

    <q-dialog v-model="information">
      <div
        class="bg-white gt-sm"
        style="width: 800px !important; height: 650px"
      >
        <div class="q-pa-md">
          <div
            class="full-width relative-position row justify-center"
            style="height: 45px"
          >
            <div class="absolute-right q-pt-sm">
              <q-btn flat color="grey-6" @click="information = false">
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
                  <q-input outlined v-model="infoName" />
                </div>
              </div>

              <div class="col-6 q-px-sm flex justify-end">
                <div class="text-grey-7">
                  <span>First Name</span>
                </div>

                <div class="q-pt-sm full-width">
                  <q-input outlined v-model="enInfoName" />
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
                  <q-input outlined v-model="infoLastName" />
                </div>
              </div>

              <div class="col-6 q-px-sm flex justify-end">
                <div class="text-grey-7">
                  <span>Last Name</span>
                </div>

                <div class="q-pt-sm full-width">
                  <q-input outlined v-model="enInfoLastName" />
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
                    v-model="infoGender"
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
                    v-model="enInfoGender"
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
                    v-model="infoMaritalStatus"
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
                    v-model="enInfoMaritalStatus"
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
                        <div>{{ infoMilitaryService }}</div>
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
                        <div>{{ enInfoMilitaryService }}</div>
                      </div>
                    </template>

                    <div>
                      <q-list>
                        <q-item
                          clickable
                          v-close-popup
                          @click="militaryService = 'Completed'"
                        >
                          <q-item-section>
                            <q-item-label>Completed</q-item-label>
                          </q-item-section>
                        </q-item>

                        <q-item
                          clickable
                          v-close-popup
                          @click="militaryService = 'Exempted'"
                        >
                          <q-item-section>
                            <q-item-label>Exempted</q-item-label>
                          </q-item-section>
                        </q-item>

                        <q-item
                          clickable
                          v-close-popup
                          @click="militaryService = 'Educational Exemption'"
                        >
                          <q-item-section>
                            <q-item-label>Educational Exemption</q-item-label>
                          </q-item-section>
                        </q-item>

                        <q-item
                          clickable
                          v-close-popup
                          @click="militaryService = 'Ongoing'"
                        >
                          <q-item-section>
                            <q-item-label>Ongoing</q-item-label>
                          </q-item-section>
                        </q-item>

                        <q-item
                          clickable
                          v-close-popup
                          @click="militaryService = 'Not served yet'"
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
                    v-model="infoCity"
                    :options="infoOptionsCity"
                    color="primary"
                    outlined
                    clearable
                    use-input
                    @filter="filterCity"
                  >
                    <template v-slot:selected>
                      <div
                        class="q-pa-sm br-4"
                        v-if="infoCity"
                        style="background: #e0e0e0 !important"
                      >
                        {{ infoCity }}
                      </div>
                    </template>
                  </q-select>
                </div>
              </div>

              <div class="col-6 q-px-sm q-pt-sm flex justify-end">
                <div class="text-grey-7">
                  <span>City</span>
                </div>

                <div class="q-pt-sm full-width" style="direction: ltr">
                  <q-select
                    v-model="enInfoCity"
                    :options="enInfoOptionsCity"
                    color="primary"
                    use-chips
                    outlined
                    clearable
                    use-input
                    @filter="enFilterCity"
                  >
                    <template v-slot:selected>
                      <div
                        class="q-pa-sm br-4"
                        style="background: #e0e0e0 !important"
                        v-if="enInfoCity"
                      >
                        {{ enInfoCity }}
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
                  <q-input outlined v-model="infoRegion" />
                </div>
              </div>

              <div class="col-6 q-px-sm q-pt-sm flex justify-end">
                <div class="text-grey-7">
                  <span>Region</span>
                </div>

                <div class="q-pt-sm full-width">
                  <q-input outlined v-model="enInfoRegion" />
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
                      v-model="infoBirth"
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

                  <q-date minimal v-model="enInfoBirth" />
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
                  <q-input outlined type="number" v-model.number="infoNumber" />
                </div>
              </div>

              <div class="col-6 q-px-sm q-pt-sm flex justify-end">
                <div class="text-grey-7">
                  <span>Phone Number (Optional)</span>
                </div>

                <div class="q-pt-sm full-width">
                  <q-input
                    type="number"
                    outlined
                    v-model.number="enInfoNumber"
                  />
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
                        <div>{{ infoinfoExpectedSalary }}</div>
                      </div>
                    </template>

                    <div>
                      <q-list>
                        <q-item
                          clickable
                          v-close-popup
                          @click="infoinfoExpectedSalary = '3 - 2 میلیون تومان'"
                        >
                          <q-item-section>
                            <q-item-label>3 - 2 میلیون تومان</q-item-label>
                          </q-item-section>
                        </q-item>

                        <q-item
                          clickable
                          v-close-popup
                          @click="infoinfoExpectedSalary = '4 - 3 میلیون تومان'"
                        >
                          <q-item-section>
                            <q-item-label>4 - 3 میلیون تومان</q-item-label>
                          </q-item-section>
                        </q-item>

                        <q-item
                          clickable
                          v-close-popup
                          @click="infoinfoExpectedSalary = '5 - 4 میلیون تومان'"
                        >
                          <q-item-section>
                            <q-item-label>5 - 4 میلیون تومان</q-item-label>
                          </q-item-section>
                        </q-item>

                        <q-item
                          clickable
                          v-close-popup
                          @click="infoinfoExpectedSalary = '6 - 5 میلیون تومان'"
                        >
                          <q-item-section>
                            <q-item-label>6 - 5 میلیون تومان</q-item-label>
                          </q-item-section>
                        </q-item>

                        <q-item
                          clickable
                          v-close-popup
                          @click="infoinfoExpectedSalary = '8 - 6 میلیون تومان'"
                        >
                          <q-item-section>
                            <q-item-label>8 - 6 میلیون تومان</q-item-label>
                          </q-item-section>
                        </q-item>

                        <q-item
                          clickable
                          v-close-popup
                          @click="
                            infoinfoExpectedSalary = '10 - 8 میلیون تومان'
                          "
                        >
                          <q-item-section>
                            <q-item-label>10 - 8 میلیون تومان</q-item-label>
                          </q-item-section>
                        </q-item>

                        <q-item
                          clickable
                          v-close-popup
                          @click="
                            infoinfoExpectedSalary = '12 - 10 میلیون تومان'
                          "
                        >
                          <q-item-section>
                            <q-item-label>12 - 10 میلیون تومان</q-item-label>
                          </q-item-section>
                        </q-item>

                        <q-item
                          clickable
                          v-close-popup
                          @click="
                            infoinfoExpectedSalary = '15 - 12 میلیون تومان'
                          "
                        >
                          <q-item-section>
                            <q-item-label>15 - 12 میلیون تومان</q-item-label>
                          </q-item-section>
                        </q-item>

                        <q-item
                          clickable
                          v-close-popup
                          @click="
                            infoinfoExpectedSalary = '25 - 20 میلیون تومان'
                          "
                        >
                          <q-item-section>
                            <q-item-label>25 - 20 میلیون تومان</q-item-label>
                          </q-item-section>
                        </q-item>

                        <q-item
                          clickable
                          v-close-popup
                          @click="
                            infoinfoExpectedSalary = '35 - 25 ميليون تومان'
                          "
                        >
                          <q-item-section>
                            <q-item-label>35 - 25 ميليون تومان</q-item-label>
                          </q-item-section>
                        </q-item>

                        <q-item
                          clickable
                          v-close-popup
                          @click="
                            infoinfoExpectedSalary = '45 - 35 ميليون تومان'
                          "
                        >
                          <q-item-section>
                            <q-item-label>45 - 35 ميليون تومان</q-item-label>
                          </q-item-section>
                        </q-item>

                        <q-item
                          clickable
                          v-close-popup
                          @click="
                            infoinfoExpectedSalary = '60 - 45 میلیون تومان'
                          "
                        >
                          <q-item-section>
                            <q-item-label>60 - 45 میلیون تومان</q-item-label>
                          </q-item-section>
                        </q-item>

                        <q-item
                          clickable
                          v-close-popup
                          @click="
                            infoinfoExpectedSalary = '60 میلیون تومان به بالا'
                          "
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
                        <div>{{ enInfoinfoExpectedSalary }}</div>
                      </div>
                    </template>

                    <div>
                      <q-list>
                        <q-item
                          clickable
                          v-close-popup
                          @click="
                            enInfoinfoExpectedSalary = '2 - 3 Million Tomans'
                          "
                        >
                          <q-item-section>
                            <q-item-label>2 - 3 Million Tomans</q-item-label>
                          </q-item-section>
                        </q-item>

                        <q-item
                          clickable
                          v-close-popup
                          @click="
                            enInfoinfoExpectedSalary = '3 - 4 Million Tomans'
                          "
                        >
                          <q-item-section>
                            <q-item-label>3 - 4 Million Tomans</q-item-label>
                          </q-item-section>
                        </q-item>

                        <q-item
                          clickable
                          v-close-popup
                          @click="
                            enInfoinfoExpectedSalary = '5 - 6 Million Tomans'
                          "
                        >
                          <q-item-section>
                            <q-item-label>5 - 6 Million Tomans</q-item-label>
                          </q-item-section>
                        </q-item>

                        <q-item
                          clickable
                          v-close-popup
                          @click="
                            enInfoinfoExpectedSalary = '6 - 8 Million Tomans'
                          "
                        >
                          <q-item-section>
                            <q-item-label>6 - 8 Million Tomans</q-item-label>
                          </q-item-section>
                        </q-item>

                        <q-item
                          clickable
                          v-close-popup
                          @click="
                            enInfoinfoExpectedSalary = '8 - 10 Million Tomans'
                          "
                        >
                          <q-item-section>
                            <q-item-label>8 - 10 Million Tomans</q-item-label>
                          </q-item-section>
                        </q-item>

                        <q-item
                          clickable
                          v-close-popup
                          @click="
                            enInfoinfoExpectedSalary = '10 - 12 Million Tomans'
                          "
                        >
                          <q-item-section>
                            <q-item-label>10 - 12 Million Tomans</q-item-label>
                          </q-item-section>
                        </q-item>

                        <q-item
                          clickable
                          v-close-popup
                          @click="
                            enInfoinfoExpectedSalary = '12 - 15 Million Tomans'
                          "
                        >
                          <q-item-section>
                            <q-item-label>12 - 15 Million Tomans</q-item-label>
                          </q-item-section>
                        </q-item>

                        <q-item
                          clickable
                          v-close-popup
                          @click="
                            enInfoinfoExpectedSalary = '15 - 20 Million Tomans'
                          "
                        >
                          <q-item-section>
                            <q-item-label>15 - 20 Million Tomans</q-item-label>
                          </q-item-section>
                        </q-item>

                        <q-item
                          clickable
                          v-close-popup
                          @click="
                            enInfoinfoExpectedSalary = '20 - 25 Million Tomans'
                          "
                        >
                          <q-item-section>
                            <q-item-label>20 - 25 Million Tomans</q-item-label>
                          </q-item-section>
                        </q-item>

                        <q-item
                          clickable
                          v-close-popup
                          @click="
                            enInfoinfoExpectedSalary = '25 - 35 Million Tomans'
                          "
                        >
                          <q-item-section>
                            <q-item-label>25 - 35 Million Tomans</q-item-label>
                          </q-item-section>
                        </q-item>

                        <q-item
                          clickable
                          v-close-popup
                          @click="
                            enInfoinfoExpectedSalary = '35 - 45 Million Tomans'
                          "
                        >
                          <q-item-section>
                            <q-item-label>35 - 45 Million Tomans</q-item-label>
                          </q-item-section>
                        </q-item>

                        <q-item
                          clickable
                          v-close-popup
                          @click="
                            enInfoinfoExpectedSalary = '45 - 60 Million Tomans'
                          "
                        >
                          <q-item-section>
                            <q-item-label>45 - 60 Million Tomans</q-item-label>
                          </q-item-section>
                        </q-item>

                        <q-item
                          clickable
                          v-close-popup
                          @click="
                            enInfoinfoExpectedSalary = 'Above 60 Million Tomans'
                          "
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
                <div class="row">
                  <span class="text-grey-7"
                    >علاقمند به استخدام در کدام حوزه شغلی هستید؟ (حداکثر ۳ مورد)
                  </span>

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

                <div class="full-width">
                  <!-- @filter="filterJobs" -->
                  <q-select
                    v-model="infoJobCategory"
                    :options="InfoOptionJobCategory"
                    color="dark"
                    outlined
                    clearable
                    use-input
                    use-chips
                    multiple
                    max-values="3"
                    stack-label
                    @filter="filterJobs"
                  />
                </div>
              </div>

              <div class="col-6 q-px-sm" style="direction: ltr">
                <div>
                  <span class="text-grey-7">Preferred Job Category</span>
                </div>

                <div class="q-pt-sm full-width q-mt-lg">
                  <q-select
                    v-model="enInfoJobCategory"
                    :options="enInfoOptionJobCategory"
                    color="dark"
                    outlined
                    clearable
                    use-input
                    use-chips
                    max-values="3"
                    multiple
                    stack-label
                    @filter="enFilterJobs"
                  >
                    <template v-slot:selected-item="scope">
                      <q-chip
                        removable
                        dense
                        @remove="scope.removeAtIndex(scope.index)"
                        :tabindex="scope.tabindex"
                      >
                        <div class="q-px-sm">
                          {{ scope.opt.label }}
                        </div>
                      </q-chip>
                    </template>
                  </q-select>
                </div>
              </div>
            </div>

            <!-- Foreigner -->

            <div class="row justify-between items-center q-my-md">
              <div class="col-6 q-px-sm">
                <div class="text-grey-7">
                  <q-checkbox v-model="infoForeigner" />

                  <span> اتباع خارجی هستم </span>
                </div>
              </div>

              <div class="col-6 q-px-sm q-pt-sm flex justify-end">
                <div class="text-grey-7">
                  <q-checkbox v-model="enInfoForeigner" />

                  <span>I am Foreigner</span>
                </div>
              </div>
            </div>

            <!-- Disability -->

            <div class="row justify-between items-center q-my-md">
              <div class="col-6 q-px-sm">
                <div class="text-grey-7">
                  <q-checkbox v-model="infoDisability" />

                  <span> دارای معلولیت هستم </span>
                </div>
              </div>

              <div class="col-6 q-px-sm q-pt-sm flex justify-end">
                <div class="text-grey-7">
                  <q-checkbox v-model="enInfoDisability" />

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

      <div
        class="bg-white lt-md"
        style="width: 600px !important; height: 650px"
      >
        <div class="q-pa-md">
          <div>
            <div
              class="full-width relative-position row justify-center"
              style="height: 45px"
            >
              <div class="absolute-right q-pt-sm">
                <q-btn flat color="grey-6" @click="information = false">
                  <q-icon name="cancel" size="32px" />
                </q-btn>
              </div>

              <div class="absolute-center font-13 text-bold">
                افزودن اطلاعات اولیه
              </div>
            </div>

            <div class="flex justify-center">
              <div class="q-my-md" style="max-width: 240px">
                <q-tabs
                  class="active-forms-tab-parent"
                  active-class="active-forms-tab"
                  indicator-color="transparent"
                  v-model="basicInfomationTabs"
                  no-caps
                >
                  <q-tab name="persian" label="فارسی" />
                  <q-tab name="english" label="انگلیسی" />
                </q-tabs>
              </div>
            </div>

            <q-separator />
          </div>

          <q-tab-panels v-model="basicInfomationTabs">
            <q-tab-panel name="persian">
              <div class="q-mt-md q-mb-sm">
                <!-- Name -->

                <div class="q-my-md">
                  <div class="q-px-sm">
                    <div class="text-grey-7">
                      <span>نام</span>
                    </div>

                    <div class="q-pt-sm full-width">
                      <q-input outlined v-model="infoName" />
                    </div>
                  </div>
                </div>

                <!-- Familty -->

                <div class="q-my-md">
                  <div class="q-px-sm">
                    <div class="text-grey-7">
                      <span>نام خانوادگی</span>
                    </div>

                    <div class="q-pt-sm full-width">
                      <q-input outlined v-model="infoLastName" />
                    </div>
                  </div>
                </div>

                <!-- Gender -->

                <div class="q-my-md">
                  <div class="q-px-sm">
                    <div class="text-grey-7 q-pb-sm">
                      <span>جنسیت</span>
                    </div>

                    <div class="q-pt-sm full-width gender-section">
                      <q-tabs
                        indicator-color="transparent"
                        v-model="infoGender"
                        no-caps
                        active-class="active-tab"
                      >
                        <q-tab name="male" label="مرد" />
                        <q-tab name="female" label="زن" />
                      </q-tabs>
                    </div>
                  </div>
                </div>

                <!-- Marital Status -->

                <div class="q-my-md">
                  <div class="q-px-sm">
                    <div class="text-grey-7 q-pb-sm">
                      <span>وضعیت تاهل </span>
                    </div>

                    <div class="q-pt-sm full-width gender-section">
                      <q-tabs
                        indicator-color="transparent"
                        v-model="infoMaritalStatus"
                        no-caps
                        active-class="active-tab"
                      >
                        <q-tab name="single" label="مجرد" />
                        <q-tab name="married" label="متاهل" />
                      </q-tabs>
                    </div>
                  </div>
                </div>

                <!-- Military Service Status -->

                <div class="q-my-md">
                  <div class="q-px-sm">
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
                            <div>{{ infoMilitaryService }}</div>
                          </div>
                        </template>

                        <div>
                          <q-list>
                            <q-item
                              clickable
                              v-close-popup
                              @click="infoMilitaryService = 'انجام شده'"
                            >
                              <q-item-section>
                                <q-item-label>انجام شده</q-item-label>
                              </q-item-section>
                            </q-item>

                            <q-item
                              clickable
                              v-close-popup
                              @click="infoMilitaryService = 'معاف دائم'"
                            >
                              <q-item-section>
                                <q-item-label>معاف دائم</q-item-label>
                              </q-item-section>
                            </q-item>

                            <q-item
                              clickable
                              v-close-popup
                              @click="infoMilitaryService = 'معافیت تحصیلی'"
                            >
                              <q-item-section>
                                <q-item-label>معافیت تحصیلی</q-item-label>
                              </q-item-section>
                            </q-item>

                            <q-item
                              clickable
                              v-close-popup
                              @click="infoMilitaryService = 'در حال انجام'"
                            >
                              <q-item-section>
                                <q-item-label>در حال انجام</q-item-label>
                              </q-item-section>
                            </q-item>

                            <q-item
                              clickable
                              v-close-popup
                              @click="infoMilitaryService = 'مشمول'"
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
                </div>

                <!-- City -->

                <div class="q-my-md">
                  <div class="q-px-sm">
                    <div class="text-grey-7">
                      <span>شهر محل سکونت</span>
                    </div>

                    <div class="q-pt-sm full-width">
                      <q-select
                        v-model="infoCity"
                        :options="infoOptionsCity"
                        color="dark"
                        outlined
                        clearable
                        use-input
                        @filter="filterCity"
                      >
                        <template v-slot:selected>
                          <div
                            class="q-pa-sm br-4"
                            style="background: #e0e0e0 !important"
                            v-if="infoCity"
                          >
                            {{ infoCity }}
                          </div>
                        </template>
                      </q-select>
                    </div>
                  </div>
                </div>

                <!-- Region -->

                <div class="q-my-md">
                  <div class="q-px-sm">
                    <div class="text-grey-7">
                      <span>محله</span>

                      <q-btn flat color="primary" dense icon="info">
                        <q-tooltip
                          anchor="center left"
                          self="center right"
                          class="bg-blue-9 br-8"
                          style="width: 175px; font-size: 13px"
                        >
                          وارد کردن محل سکونت دقیق به ما کمک می کند که
                          پیشنهادهای شغلی نزدیک تر به محل زندگی شما را با اولویت
                          بالاتری به شما پیشنهاد دهیم
                        </q-tooltip>
                      </q-btn>
                    </div>

                    <div class="q-pt-sm full-width">
                      <q-input outlined v-model="infoRegion" />
                    </div>
                  </div>
                </div>

                <!-- Birth -->

                <div class="q-my-md">
                  <div class="q-px-sm">
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
                          v-model="infoBirth"
                          mask="YYYY/MM/DD"
                          calendar="persian"
                        />
                      </q-btn-dropdown>
                    </div>
                  </div>
                </div>

                <!-- Number -->

                <div class="q-my-md">
                  <div class="q-px-sm">
                    <div class="text-grey-7">
                      <span>شماره تلفن ثابت (اختیاری)</span>

                      <q-btn flat color="primary" dense icon="info">
                        <q-tooltip
                          anchor="center left"
                          self="center right"
                          class="bg-blue-9 br-8"
                          style="width: 175px; font-size: 13px"
                        >
                          در صورتی که کارفرما بخواهد با شما تماس بگیرد و موبایل
                          شما در دسترس نباشد این شماره تلفن ثابت به شما کمک می
                          کند که تماس کارفرما را از دست ندهید
                        </q-tooltip>
                      </q-btn>
                    </div>

                    <div class="q-pt-sm full-width">
                      <q-input
                        outlined
                        type="number"
                        v-model.number="infoNumber"
                      />
                    </div>
                  </div>
                </div>

                <!-- Minimum Expected Salary -->

                <div class="q-my-md">
                  <div class="q-px-sm">
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
                            <div>{{ infoExpectedSalary }}</div>
                          </div>
                        </template>

                        <div>
                          <q-list>
                            <q-item
                              clickable
                              v-close-popup
                              @click="infoExpectedSalary = '3 - 2 میلیون تومان'"
                            >
                              <q-item-section>
                                <q-item-label>3 - 2 میلیون تومان</q-item-label>
                              </q-item-section>
                            </q-item>

                            <q-item
                              clickable
                              v-close-popup
                              @click="infoExpectedSalary = '4 - 3 میلیون تومان'"
                            >
                              <q-item-section>
                                <q-item-label>4 - 3 میلیون تومان</q-item-label>
                              </q-item-section>
                            </q-item>

                            <q-item
                              clickable
                              v-close-popup
                              @click="infoExpectedSalary = '5 - 4 میلیون تومان'"
                            >
                              <q-item-section>
                                <q-item-label>5 - 4 میلیون تومان</q-item-label>
                              </q-item-section>
                            </q-item>

                            <q-item
                              clickable
                              v-close-popup
                              @click="infoExpectedSalary = '6 - 5 میلیون تومان'"
                            >
                              <q-item-section>
                                <q-item-label>6 - 5 میلیون تومان</q-item-label>
                              </q-item-section>
                            </q-item>

                            <q-item
                              clickable
                              v-close-popup
                              @click="infoExpectedSalary = '8 - 6 میلیون تومان'"
                            >
                              <q-item-section>
                                <q-item-label>8 - 6 میلیون تومان</q-item-label>
                              </q-item-section>
                            </q-item>

                            <q-item
                              clickable
                              v-close-popup
                              @click="
                                infoExpectedSalary = '10 - 8 میلیون تومان'
                              "
                            >
                              <q-item-section>
                                <q-item-label>10 - 8 میلیون تومان</q-item-label>
                              </q-item-section>
                            </q-item>

                            <q-item
                              clickable
                              v-close-popup
                              @click="
                                infoExpectedSalary = '12 - 10 میلیون تومان'
                              "
                            >
                              <q-item-section>
                                <q-item-label
                                  >12 - 10 میلیون تومان</q-item-label
                                >
                              </q-item-section>
                            </q-item>

                            <q-item
                              clickable
                              v-close-popup
                              @click="
                                infoExpectedSalary = '15 - 12 میلیون تومان'
                              "
                            >
                              <q-item-section>
                                <q-item-label
                                  >15 - 12 میلیون تومان</q-item-label
                                >
                              </q-item-section>
                            </q-item>

                            <q-item
                              clickable
                              v-close-popup
                              @click="
                                infoExpectedSalary = '25 - 20 میلیون تومان'
                              "
                            >
                              <q-item-section>
                                <q-item-label
                                  >25 - 20 میلیون تومان</q-item-label
                                >
                              </q-item-section>
                            </q-item>

                            <q-item
                              clickable
                              v-close-popup
                              @click="
                                infoExpectedSalary = '35 - 25 ميليون تومان'
                              "
                            >
                              <q-item-section>
                                <q-item-label
                                  >35 - 25 ميليون تومان</q-item-label
                                >
                              </q-item-section>
                            </q-item>

                            <q-item
                              clickable
                              v-close-popup
                              @click="
                                infoExpectedSalary = '45 - 35 ميليون تومان'
                              "
                            >
                              <q-item-section>
                                <q-item-label
                                  >45 - 35 ميليون تومان</q-item-label
                                >
                              </q-item-section>
                            </q-item>

                            <q-item
                              clickable
                              v-close-popup
                              @click="
                                infoExpectedSalary = '60 - 45 میلیون تومان'
                              "
                            >
                              <q-item-section>
                                <q-item-label
                                  >60 - 45 میلیون تومان</q-item-label
                                >
                              </q-item-section>
                            </q-item>

                            <q-item
                              clickable
                              v-close-popup
                              @click="
                                infoExpectedSalary = '60 میلیون تومان به بالا'
                              "
                            >
                              <q-item-section>
                                <q-item-label
                                  >60 میلیون تومان به بالا</q-item-label
                                >
                              </q-item-section>
                            </q-item>
                          </q-list>
                        </div>
                      </q-btn-dropdown>
                    </div>
                  </div>
                </div>

                <!-- Preferred Job Category -->

                <div class="q-my-md">
                  <div class="q-px-sm">
                    <div class="text-grey-7">
                      <span
                        >علاقمند به استخدام در کدام حوزه شغلی هستید؟ (حداکثر ۳
                        مورد)
                      </span>

                      <q-btn flat color="primary" dense icon="info">
                        <q-tooltip
                          anchor="center left"
                          self="center right"
                          class="bg-blue-9 br-8"
                          style="width: 175px; font-size: 13px"
                        >
                          شما با وارد کردن گروه های شغلی مورد علاقه خود می
                          توانید آگهی های شغلی مرتبط با این گروه ها را در قالب
                          ایمیل دریافت کنید.
                        </q-tooltip>
                      </q-btn>
                    </div>

                    <div class="q-pt-sm full-width">
                      <q-select
                        v-model="infoJobCategory"
                        :options="InfoOptionJobCategory"
                        color="dark"
                        max-values="3"
                        outlined
                        clearable
                        use-input
                        use-chips
                        multiple
                        stack-label
                        @filter="filterJobs"
                      >
                        <template v-slot:selected-item="scope">
                          <q-chip
                            style="direction: ltr"
                            removable
                            dense
                            @remove="scope.removeAtIndex(scope.index)"
                            :tabindex="scope.tabindex"
                          >
                            <div class="q-px-sm">
                              {{ scope.opt.label }}
                            </div>
                          </q-chip>
                        </template>
                      </q-select>
                    </div>
                  </div>
                </div>

                <!-- Foreigner -->

                <div class="q-my-md">
                  <div class="q-px-sm">
                    <div class="text-grey-7">
                      <q-checkbox v-model="infoForeigner" />

                      <span> اتباع خارجی هستم </span>
                    </div>
                  </div>
                </div>

                <!-- Disability -->

                <div class="q-my-md">
                  <div class="q-px-sm">
                    <div class="text-grey-7">
                      <q-checkbox v-model="infoDisability" />

                      <span> دارای معلولیت هستم </span>
                    </div>
                  </div>
                </div>
              </div>
            </q-tab-panel>

            <q-tab-panel name="english" style="direction: ltr">
              <div class="q-mt-md q-mb-sm">
                <!-- Name -->

                <div class="q-my-md">
                  <div class="q-px-sm">
                    <div class="text-grey-7">
                      <span>First Name</span>
                    </div>

                    <div class="q-pt-sm full-width">
                      <q-input outlined v-model="enInfoName" />
                    </div>
                  </div>
                </div>

                <!-- Familty -->

                <div class="q-my-md">
                  <div class="q-px-sm">
                    <div class="text-grey-7">
                      <span>Last Name</span>
                    </div>

                    <div class="q-pt-sm full-width">
                      <q-input outlined v-model="enInfoLastName" />
                    </div>
                  </div>
                </div>

                <!-- Gender -->

                <div class="q-my-md">
                  <div class="q-px-sm">
                    <div class="text-grey-7 q-pb-sm">
                      <span>Gender</span>
                    </div>

                    <div class="q-pt-sm full-width gender-section">
                      <q-tabs
                        indicator-color="transparent"
                        v-model="enInfoGender"
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

                <div class="q-my-md">
                  <div class="q-px-sm">
                    <div class="text-grey-7 q-pb-sm">
                      <span>Marital Status</span>
                    </div>

                    <div class="q-pt-sm full-width gender-section">
                      <q-tabs
                        indicator-color="transparent"
                        v-model="enInfoMaritalStatus"
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

                <div class="q-my-md">
                  <div class="col-6 q-px-sm">
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
                            <div>{{ enInfoMilitaryService }}</div>
                          </div>
                        </template>

                        <div>
                          <q-list>
                            <q-item
                              clickable
                              v-close-popup
                              @click="enInfoMilitaryService = 'Completed'"
                            >
                              <q-item-section>
                                <q-item-label>Completed</q-item-label>
                              </q-item-section>
                            </q-item>

                            <q-item
                              clickable
                              v-close-popup
                              @click="enInfoMilitaryService = 'Exempted'"
                            >
                              <q-item-section>
                                <q-item-label>Exempted</q-item-label>
                              </q-item-section>
                            </q-item>

                            <q-item
                              clickable
                              v-close-popup
                              @click="
                                enInfoMilitaryService = 'Educational Exemption'
                              "
                            >
                              <q-item-section>
                                <q-item-label
                                  >Educational Exemption</q-item-label
                                >
                              </q-item-section>
                            </q-item>

                            <q-item
                              clickable
                              v-close-popup
                              @click="enInfoMilitaryService = 'Ongoing'"
                            >
                              <q-item-section>
                                <q-item-label>Ongoing</q-item-label>
                              </q-item-section>
                            </q-item>

                            <q-item
                              clickable
                              v-close-popup
                              @click="enInfoMilitaryService = 'Not served yet'"
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

                <div class="q-my-md">
                  <div class="q-px-sm q-pt-sm">
                    <div class="text-grey-7">
                      <span>City</span>
                    </div>

                    <div class="q-pt-sm full-width" style="direction: ltr">
                      <q-select
                        v-model="enInfoCity"
                        :options="enInfoOptionsCity"
                        color="dark"
                        use-chips
                        outlined
                        clearable
                        use-input
                        @filter="enFilterCity"
                      >
                        <template v-slot:selected>
                          <div
                            class="q-pa-sm br-4"
                            style="background: #e0e0e0 !important"
                            v-if="enInfoCity"
                          >
                            {{ enInfoCity }}
                          </div>
                        </template>
                      </q-select>
                    </div>
                  </div>
                </div>

                <!-- Region -->

                <div class="q-my-md">
                  <div class="q-px-sm q-pt-sm">
                    <div class="text-grey-7">
                      <span>Region</span>
                    </div>

                    <div class="q-pt-sm full-width">
                      <q-input outlined v-model="enInfoRegion" />
                    </div>
                  </div>
                </div>

                <!-- Birth -->

                <div class="q-my-md">
                  <div class="q-px-sm">
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

                      <q-date minimal v-model="enInfoBirth" />
                    </q-btn-dropdown>
                  </div>
                </div>

                <!-- Number -->

                <div class="q-my-md">
                  <div class="q-px-sm q-pt-sm">
                    <div class="text-grey-7">
                      <span>Phone Number (Optional)</span>
                    </div>

                    <div class="q-pt-sm full-width">
                      <q-input
                        type="number"
                        outlined
                        v-model.number="enInfoNumber"
                      />
                    </div>
                  </div>
                </div>

                <!-- Minimum Expected Salary -->

                <div class="q-my-md">
                  <div class="q-px-sm">
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
                            <div>{{ enInfoinfoExpectedSalary }}</div>
                          </div>
                        </template>

                        <div>
                          <q-list>
                            <q-item
                              clickable
                              v-close-popup
                              @click="
                                enInfoinfoExpectedSalary =
                                  '2 - 3 Million Tomans'
                              "
                            >
                              <q-item-section>
                                <q-item-label
                                  >2 - 3 Million Tomans</q-item-label
                                >
                              </q-item-section>
                            </q-item>

                            <q-item
                              clickable
                              v-close-popup
                              @click="
                                enInfoinfoExpectedSalary =
                                  '3 - 4 Million Tomans'
                              "
                            >
                              <q-item-section>
                                <q-item-label
                                  >3 - 4 Million Tomans</q-item-label
                                >
                              </q-item-section>
                            </q-item>

                            <q-item
                              clickable
                              v-close-popup
                              @click="
                                enInfoinfoExpectedSalary =
                                  '5 - 6 Million Tomans'
                              "
                            >
                              <q-item-section>
                                <q-item-label
                                  >5 - 6 Million Tomans</q-item-label
                                >
                              </q-item-section>
                            </q-item>

                            <q-item
                              clickable
                              v-close-popup
                              @click="
                                enInfoinfoExpectedSalary =
                                  '6 - 8 Million Tomans'
                              "
                            >
                              <q-item-section>
                                <q-item-label
                                  >6 - 8 Million Tomans</q-item-label
                                >
                              </q-item-section>
                            </q-item>

                            <q-item
                              clickable
                              v-close-popup
                              @click="
                                enInfoinfoExpectedSalary =
                                  '8 - 10 Million Tomans'
                              "
                            >
                              <q-item-section>
                                <q-item-label
                                  >8 - 10 Million Tomans</q-item-label
                                >
                              </q-item-section>
                            </q-item>

                            <q-item
                              clickable
                              v-close-popup
                              @click="
                                enInfoinfoExpectedSalary =
                                  '10 - 12 Million Tomans'
                              "
                            >
                              <q-item-section>
                                <q-item-label
                                  >10 - 12 Million Tomans</q-item-label
                                >
                              </q-item-section>
                            </q-item>

                            <q-item
                              clickable
                              v-close-popup
                              @click="
                                enInfoinfoExpectedSalary =
                                  '12 - 15 Million Tomans'
                              "
                            >
                              <q-item-section>
                                <q-item-label
                                  >12 - 15 Million Tomans</q-item-label
                                >
                              </q-item-section>
                            </q-item>

                            <q-item
                              clickable
                              v-close-popup
                              @click="
                                enInfoinfoExpectedSalary =
                                  '15 - 20 Million Tomans'
                              "
                            >
                              <q-item-section>
                                <q-item-label
                                  >15 - 20 Million Tomans</q-item-label
                                >
                              </q-item-section>
                            </q-item>

                            <q-item
                              clickable
                              v-close-popup
                              @click="
                                enInfoinfoExpectedSalary =
                                  '20 - 25 Million Tomans'
                              "
                            >
                              <q-item-section>
                                <q-item-label
                                  >20 - 25 Million Tomans</q-item-label
                                >
                              </q-item-section>
                            </q-item>

                            <q-item
                              clickable
                              v-close-popup
                              @click="
                                enInfoinfoExpectedSalary =
                                  '25 - 35 Million Tomans'
                              "
                            >
                              <q-item-section>
                                <q-item-label
                                  >25 - 35 Million Tomans</q-item-label
                                >
                              </q-item-section>
                            </q-item>

                            <q-item
                              clickable
                              v-close-popup
                              @click="
                                enInfoinfoExpectedSalary =
                                  '35 - 45 Million Tomans'
                              "
                            >
                              <q-item-section>
                                <q-item-label
                                  >35 - 45 Million Tomans</q-item-label
                                >
                              </q-item-section>
                            </q-item>

                            <q-item
                              clickable
                              v-close-popup
                              @click="
                                enInfoinfoExpectedSalary =
                                  '45 - 60 Million Tomans'
                              "
                            >
                              <q-item-section>
                                <q-item-label
                                  >45 - 60 Million Tomans</q-item-label
                                >
                              </q-item-section>
                            </q-item>

                            <q-item
                              clickable
                              v-close-popup
                              @click="
                                enInfoinfoExpectedSalary =
                                  'Above 60 Million Tomans'
                              "
                            >
                              <q-item-section>
                                <q-item-label
                                  >Above 60 Million Tomans</q-item-label
                                >
                              </q-item-section>
                            </q-item>
                          </q-list>
                        </div>
                      </q-btn-dropdown>
                    </div>
                  </div>
                </div>

                <!-- Preferred Job Category -->

                <div class="q-my-md">
                  <div class="q-px-sm q-pt-sm">
                    <div class="text-grey-7">
                      <span>Preferred Job Category</span>
                    </div>

                    <div class="q-pt-sm full-width" style="direction: rtl">
                      <q-select
                        v-model="enInfoJobCategory"
                        :options="enInfoOptionJobCategory"
                        color="dark"
                        max-values="3"
                        outlined
                        clearable
                        use-input
                        use-chips
                        multiple
                        stack-label
                        @filter="enFilterJobs"
                      >
                        <template v-slot:selected-item="scope">
                          <q-chip
                            removable
                            dense
                            @remove="scope.removeAtIndex(scope.index)"
                            :tabindex="scope.tabindex"
                          >
                            <div class="q-px-sm">
                              {{ scope.opt.label }}
                            </div>
                          </q-chip>
                        </template>
                      </q-select>
                    </div>
                  </div>
                </div>

                <!-- Foreigner -->

                <div class="q-my-md">
                  <div class="q-px-sm q-pt-sm">
                    <div class="text-grey-7">
                      <q-checkbox v-model="enInfoForeigner" />

                      <span>I am Foreigner</span>
                    </div>
                  </div>
                </div>

                <!-- Disability -->

                <div class="q-my-md">
                  <div class="q-px-sm q-pt-sm">
                    <div class="text-grey-7">
                      <q-checkbox v-model="enInfoDisability" />

                      <span>I have a disability</span>
                    </div>
                  </div>
                </div>
              </div>
            </q-tab-panel>
          </q-tab-panels>
        </div>

        <div
          class="full-width relative-position form-buttons flex justify-center items-center"
        >
          <div>
            <q-btn flat color="grey-7" label="انصراف" />

            <q-btn color="primary" label="ذخیره تغییرات" />
          </div>
        </div>
      </div>
    </q-dialog>

    <!-- Create Work Experience Dialog - Responsive -->

    <q-dialog v-model="createWorkExperience">
      <div
        class="bg-white gt-sm"
        style="width: 800px !important; height: 602px"
      >
        <div
          class="full-width relative-position row justify-center"
          style="height: 45px"
        >
          <div class="absolute-right q-pt-sm">
            <q-btn flat color="grey-6" @click="createWorkExperience = false">
              <q-icon name="cancel" size="32px" />
            </q-btn>
          </div>

          <div class="absolute-center font-13 text-bold">
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
                <q-input outlined v-model="workEXPJobTitle" />
              </div>
            </div>

            <div class="col-6 q-px-sm">
              <div class="text-grey-7">
                <span>Job Title</span>
              </div>

              <div class="q-pt-sm full-width">
                <q-input outlined v-model="enWorkEXPJobTitle" />
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
                  v-model="workEXPWhatJobCategory"
                  :options="workEXPOptionsWhatJob"
                  color="dark"
                  outlined
                  clearable
                  use-input
                  use-chips
                  stack-label
                  @filter="workEXPFilterWhatJobs"
                  input-debounce="0"
                >
                  <template v-slot:selected>
                    <div v-if="workEXPWhatJobCategory">
                      <div
                        class="q-pa-sm br-4"
                        style="background: #e0e0e0 !important"
                      >
                        {{ workEXPWhatJobCategory }}
                      </div>
                    </div>
                  </template>
                </q-select>
              </div>
            </div>

            <div class="col-6 q-px-sm q-pt-sm">
              <div class="text-grey-7">
                <span>Job Category</span>
              </div>

              <div class="q-pt-sm full-width" style="direction: ltr">
                <q-select
                  v-model="enWhatJobCategory"
                  :options="enWhatJobOptions"
                  color="dark"
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
                  v-model="workEXPSeniorityLevel"
                  :options="workEXPOptionsSeniorityLevel"
                  color="dark"
                  outlined
                  clearable
                  use-input
                  use-chips
                  stack-label
                  @filter="workEXPSeniorityLevelFilter"
                  input-debounce="0"
                >
                  <template v-slot:selected>
                    <div v-if="workEXPSeniorityLevel">
                      <div
                        class="q-pa-sm br-4"
                        style="background: #e0e0e0 !important"
                      >
                        {{ workEXPSeniorityLevel }}
                      </div>
                    </div>
                  </template>
                </q-select>
              </div>
            </div>

            <div class="col-6 q-px-sm q-pt-sm">
              <div class="text-grey-7">
                <span>Seniority Level</span>
              </div>

              <div class="q-pt-sm full-width" style="direction: ltr">
                <q-select
                  v-model="enWorkEXPSeniorityLevel"
                  :options="enWorkEXPOptionsSeniorityLevel"
                  color="dark"
                  outlined
                  clearable
                  use-input
                  use-chips
                  stack-label
                  @filter="enWorkEXPSeniorityLevelFilter"
                  input-debounce="0"
                >
                  <template v-slot:selected>
                    <div v-if="enWorkEXPSeniorityLevel">
                      <div
                        class="q-pa-sm br-4"
                        style="background: #e0e0e0 !important"
                      >
                        {{ enWorkEXPSeniorityLevel }}
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
                <q-input outlined v-model="workEXPCompanyName" />
              </div>
            </div>

            <div class="col-6 q-px-sm">
              <div class="text-grey-7">
                <span>Company Name</span>
              </div>

              <div class="q-pt-sm full-width">
                <q-input outlined v-model="enWorkEXPCompanyName" />
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
                  v-model="workEXPIndustry"
                  :options="workEXPIndustryOptions"
                  color="dark"
                  outlined
                  clearable
                  use-input
                  use-chips
                  stack-label
                  @filter="workEXPIFilterIndustry"
                  input-debounce="0"
                >
                  <template v-slot:selected>
                    <div v-if="workEXPIndustryFilter">
                      <div
                        class="q-pa-sm br-4"
                        style="background: #e0e0e0 !important"
                      >
                        {{ workEXPIndustry }}
                      </div>
                    </div>
                  </template>
                </q-select>
              </div>
            </div>

            <div class="col-6 q-px-sm q-pt-sm">
              <div class="text-grey-7">
                <span>Industry (Optional) </span>
              </div>

              <div class="q-pt-sm full-width" style="direction: ltr">
                <q-select
                  v-model="enWorkEXPIndustry"
                  :options="enWorkEXPIndustryOptions"
                  color="dark"
                  outlined
                  clearable
                  use-input
                  use-chips
                  stack-label
                  @filter="enWorkEXPIndustryFilter"
                  input-debounce="0"
                >
                  <template v-slot:selected>
                    <div v-if="enWorkEXPIndustry">
                      <div
                        class="q-pa-sm br-4"
                        style="background: #e0e0e0 !important"
                      >
                        {{ enWorkEXPIndustry }}
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
                    v-model="workEXPCountry"
                    :options="workEXPCountryOptions"
                    color="dark"
                    outlined
                    clearable
                    use-input
                    use-chips
                    stack-label
                    @filter="workEXPCountryFilter"
                    input-debounce="0"
                  >
                    <template v-slot:selected>
                      <div v-if="workEXPCountry">
                        <div
                          class="q-pa-sm br-4"
                          style="background: #e0e0e0 !important"
                        >
                          {{ workEXPCountry }}
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
                    v-model="workEXPCity"
                    :options="workEXPCityOptions"
                    color="dark"
                    outlined
                    clearable
                    use-input
                    use-chips
                    stack-label
                    @filter="workEXPCityFilter"
                    input-debounce="0"
                  >
                    <template v-slot:selected>
                      <div v-if="workEXPCity">
                        <div
                          class="q-pa-sm br-4"
                          style="background: #e0e0e0 !important"
                        >
                          {{ workEXPCity }}
                        </div>
                      </div>
                    </template>
                  </q-select>
                </div>
              </div>
            </div>

            <div class="col-6 q-px-sm q-pt-sm">
              <div class="col-6 q-px-sm row" style="direction: ltr">
                <div class="col-6 q-pl-sm">
                  <div class="text-grey-7">
                    <span>Country </span>
                  </div>

                  <div class="full-width">
                    <q-select
                      v-model="enCountry"
                      :options="enCountryOptions"
                      color="dark"
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
                      color="dark"
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
                    v-model="workEXPFromMonth"
                    :options="workEXPFromMonthOptions"
                    color="dark"
                    outlined
                    clearable
                    use-input
                    use-chips
                    stack-label
                    @filter="workEXPFFromMonthFilter"
                    input-debounce="0"
                  >
                    <template v-slot:selected>
                      <div v-if="workEXPFromMonth">
                        <div
                          class="q-pa-sm br-4"
                          style="background: #e0e0e0 !important"
                        >
                          {{ workEXPFromMonth }}
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
                    v-model="workEXPFromYear"
                    :options="workEXPFromYearOptions"
                    color="dark"
                    outlined
                    clearable
                    use-input
                    use-chips
                    stack-label
                    @filter="workEXPFromYearFilter"
                    input-debounce="0"
                  >
                    <template v-slot:selected>
                      <div v-if="workEXPFromYear">
                        <div
                          class="q-pa-sm br-4"
                          style="background: #e0e0e0 !important"
                        >
                          {{ workEXPFromYear }}
                        </div>
                      </div>
                    </template>
                  </q-select>
                </div>
              </div>
            </div>

            <div class="col-6 q-px-sm q-pt-sm">
              <div class="col-6 q-px-sm row" style="direction: ltr">
                <div class="col-6 q-pl-sm">
                  <div class="text-grey-7">
                    <span>From Month </span>
                  </div>

                  <div class="full-width">
                    <q-select
                      v-model="enworkEXPFromMonth"
                      :options="enworkEXPFromMonthOptions"
                      color="dark"
                      outlined
                      clearable
                      use-input
                      use-chips
                      stack-label
                      @filter="workEXPFromMonthFilter"
                      input-debounce="0"
                    >
                      <template v-slot:selected>
                        <div v-if="enWorkEXPFromMonth">
                          <div
                            class="q-pa-sm br-4"
                            style="background: #e0e0e0 !important"
                          >
                            {{ enWorkEXPFromMonth }}
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
                      color="dark"
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
                    v-model="workEXPToMonth"
                    :options="workEXPToMonthOptions"
                    color="dark"
                    outlined
                    clearable
                    use-input
                    use-chips
                    stack-label
                    @filter="workEXPToMonthFilter"
                    input-debounce="0"
                  >
                    <template v-slot:selected>
                      <div v-if="workEXPToMonth">
                        <div
                          class="q-pa-sm br-4"
                          style="background: #e0e0e0 !important"
                        >
                          {{ workEXPToMonth }}
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
                    v-model="workEXPToYear"
                    :options="workEXPToYearOptions"
                    color="dark"
                    outlined
                    clearable
                    use-input
                    use-chips
                    stack-label
                    @filter="workEXPToYearFilter"
                    input-debounce="0"
                  >
                    <template v-slot:selected>
                      <div v-if="workEXPToYear">
                        <div
                          class="q-pa-sm br-4"
                          style="background: #e0e0e0 !important"
                        >
                          {{ workEXPToYear }}
                        </div>
                      </div>
                    </template>
                  </q-select>
                </div>
              </div>
            </div>

            <div class="col-6 q-px-sm q-pt-sm">
              <div class="col-6 q-px-sm row" style="direction: ltr">
                <div class="col-6 q-pl-sm">
                  <div class="text-grey-7">
                    <span>To Month </span>
                  </div>

                  <div class="full-width">
                    <q-select
                      v-model="enWorkEXPToMonth"
                      :options="enWorkEXPToMonthOptions"
                      color="dark"
                      outlined
                      clearable
                      use-input
                      use-chips
                      stack-label
                      @filter="enWorkEXPToMonthFilter"
                      input-debounce="0"
                    >
                      <template v-slot:selected>
                        <div v-if="enWorkEXPToMonth">
                          <div
                            class="q-pa-sm br-4"
                            style="background: #e0e0e0 !important"
                          >
                            {{ enWorkEXPToMonth }}
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
                      v-model="enWorkEXPToYear"
                      :options="enWorkEXPToYearOptions"
                      color="dark"
                      outlined
                      clearable
                      use-input
                      use-chips
                      stack-label
                      @filter="enWorkEXPToYearFilter"
                      input-debounce="0"
                    >
                      <template v-slot:selected>
                        <div v-if="enWorkEXPToYear">
                          <div
                            class="q-pa-sm br-4"
                            style="background: #e0e0e0 !important"
                          >
                            {{ enWorkEXPToYear }}
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
                <q-checkbox v-model="workEXPCurrentJob" />

                <span> هنوز در این شرکت مشغول به کار هستم. </span>
              </div>
            </div>

            <div class="col-6 q-px-sm q-pt-sm">
              <div class="text-grey-7">
                <q-checkbox v-model="enWorkEXPCurrentJob" />

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
                  v-model="workEXPAchievements"
                  outlined
                  type="textarea"
                />
              </div>
            </div>

            <div class="col-6 q-px-sm q-mt-sm">
              <div class="text-grey-7">
                <span>Achievements (Optional) </span>
              </div>

              <div class="q-pt-sm full-width">
                <q-input
                  maxlength="3000"
                  counter
                  v-model="enWorkEXPAchievements"
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

      <div
        class="bg-white lt-md"
        style="width: 600px !important; height: 600px"
      >
        <div>
          <div
            class="full-width relative-position row justify-center"
            style="height: 45px"
          >
            <div class="absolute-right q-pt-sm">
              <q-btn flat color="grey-6" @click="createWorkExperience = false">
                <q-icon name="cancel" size="32px" />
              </q-btn>
            </div>

            <div class="absolute-center font-13 text-bold">
              افزودن سابقه شغلی جدید
            </div>
          </div>

          <div class="flex justify-center">
            <div class="q-my-md" style="max-width: 240px">
              <q-tabs
                class="active-forms-tab-parent"
                active-class="active-forms-tab"
                indicator-color="transparent"
                v-model="createExperienceTabs"
                no-caps
              >
                <q-tab name="persian" label="فارسی" />
                <q-tab name="english" label="انگلیسی" />
              </q-tabs>
            </div>
          </div>

          <q-separator />
        </div>

        <q-tab-panels v-model="createExperienceTabs">
          <q-tab-panel name="persian">
            <div class="q-pa-md">
              <!-- Job Title -->

              <div class="q-my-md">
                <div class="q-px-sm">
                  <div class="text-grey-7">
                    <span>عنوان شغل</span>
                  </div>

                  <div class="q-pt-sm full-width">
                    <q-input outlined v-model="workEXPJobTitle" />
                  </div>
                </div>
              </div>

              <!-- Job Category -->

              <div class="q-my-md">
                <div class="q-px-sm">
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
                      v-model="workEXPWhatJobCategory"
                      :options="workEXPOptionsWhatJob"
                      color="dark"
                      outlined
                      clearable
                      use-input
                      use-chips
                      stack-label
                      @filter="workEXPFilterWhatJobs"
                      input-debounce="0"
                    >
                      <template v-slot:selected>
                        <div v-if="workEXPWhatJobCategory">
                          <div
                            class="q-pa-sm br-4"
                            style="background: #e0e0e0 !important"
                          >
                            {{ workEXPWhatJobCategory }}
                          </div>
                        </div>
                      </template>
                    </q-select>
                  </div>
                </div>
              </div>

              <!-- Seniority Level -->

              <div class="q-my-md">
                <div class="col-6 q-px-sm">
                  <div class="text-grey-7">
                    <span>رده سازمانی </span>
                  </div>

                  <div class="q-pt-sm full-width">
                    <q-select
                      v-model="workEXPSeniorityLevel"
                      :options="workEXPOptionsSeniorityLevel"
                      color="dark"
                      outlined
                      clearable
                      use-input
                      use-chips
                      stack-label
                      @filter="workEXPFilterSeniorityLevel"
                      input-debounce="0"
                    >
                      <template v-slot:selected>
                        <div v-if="workEXPSeniorityLevel">
                          <div
                            class="q-pa-sm br-4"
                            style="background: #e0e0e0 !important"
                          >
                            {{ workEXPSeniorityLevel }}
                          </div>
                        </div>
                      </template>
                    </q-select>
                  </div>
                </div>
              </div>

              <!-- Company Name -->

              <div class="q-my-md">
                <div class="cq-px-sm">
                  <div class="text-grey-7">
                    <span>نام سازمان</span>
                  </div>

                  <div class="q-pt-sm full-width">
                    <q-input outlined v-model="workEXPCompanyName" />
                  </div>
                </div>
              </div>

              <!-- Industry (Optional) -->

              <div class="q-my-md">
                <div class="q-px-sm">
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
                      v-model="workEXPIndustry"
                      :options="workEXPIndustryOptions"
                      color="dark"
                      outlined
                      clearable
                      use-input
                      use-chips
                      stack-label
                      @filter="workEXPIndustryFilter"
                      input-debounce="0"
                    >
                      <template v-slot:selected>
                        <div v-if="workEXPIndustry">
                          <div
                            class="q-pa-sm br-4"
                            style="background: #e0e0e0 !important"
                          >
                            {{ workEXPIndustry }}
                          </div>
                        </div>
                      </template>
                    </q-select>
                  </div>
                </div>
              </div>

              <!-- Country And City -->

              <div class="q-my-md">
                <div class="q-px-sm row">
                  <div class="col-6 q-pr-sm">
                    <div class="text-grey-7">
                      <span>کشور </span>
                    </div>

                    <div class="q-pt-sm full-width">
                      <q-select
                        v-model="workEXPCountry"
                        :options="workEXPCountryOptions"
                        color="dark"
                        outlined
                        clearable
                        use-input
                        use-chips
                        stack-label
                        @filter="workEXPCountryFilter"
                      >
                        <template v-slot:selected>
                          <div v-if="workEXPCountry">
                            <div
                              class="q-pa-sm br-4"
                              style="background: #e0e0e0 !important"
                            >
                              {{ workEXPCountry }}
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
                        v-model="workEXPCity"
                        :options="workEXPCityOptions"
                        color="dark"
                        outlined
                        clearable
                        use-input
                        use-chips
                        stack-label
                        @filter="workEXPCityFilter"
                      >
                        <template v-slot:selected>
                          <div v-if="workEXPCity">
                            <div
                              class="q-pa-sm br-4"
                              style="background: #e0e0e0 !important"
                            >
                              {{ workEXPCity }}
                            </div>
                          </div>
                        </template>
                      </q-select>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Start Month And Year -->

              <div class="q-my-md">
                <div class="q-px-sm row">
                  <div class="col-6 q-pr-sm">
                    <div class="text-grey-7">
                      <span>ماه شروع </span>
                    </div>

                    <div class="q-pt-sm full-width">
                      <q-select
                        v-model="workEXPFromMonth"
                        :options="workEXPFromMonthOptions"
                        color="dark"
                        outlined
                        clearable
                        use-input
                        use-chips
                        stack-label
                        @filter="workEXPFromMonthFilter"
                      >
                        <template v-slot:selected>
                          <div v-if="workEXPFromMonth">
                            <div
                              class="q-pa-sm br-4"
                              style="background: #e0e0e0 !important"
                            >
                              {{ workEXPFromMonth }}
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
                        v-model="workEXPFromYear"
                        :options="workEXPFromYearOptions"
                        color="dark"
                        outlined
                        clearable
                        use-input
                        use-chips
                        stack-label
                        @filter="workEXPFromYearFilter"
                      >
                        <template v-slot:selected>
                          <div v-if="workEXPFromYear">
                            <div
                              class="q-pa-sm br-4"
                              style="background: #e0e0e0 !important"
                            >
                              {{ workEXPFromYear }}
                            </div>
                          </div>
                        </template>
                      </q-select>
                    </div>
                  </div>
                </div>
              </div>

              <!-- End Month And Year -->

              <div v-if="!currentJob" class="q-my-md">
                <div class="q-px-sm row">
                  <div class="col-6 q-pr-sm">
                    <div class="text-grey-7">
                      <span>ماه پایان </span>
                    </div>

                    <div class="q-pt-sm full-width">
                      <q-select
                        v-model="workEXPToMonth"
                        :options="workEXPToMonthOptions"
                        color="primary"
                        outlined
                        clearable
                        use-input
                        use-chips
                        stack-label
                        @filter="workEXPToMonthFilter"
                      >
                        <template v-slot:selected>
                          <div v-if="workEXPToMonth">
                            <div
                              class="q-pa-sm br-4"
                              style="background: #e0e0e0 !important"
                            >
                              {{ workEXPToMonth }}
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
                        v-model="workEXPToYear"
                        :options="workEXPToYearOptions"
                        color="primary"
                        outlined
                        clearable
                        use-input
                        use-chips
                        stack-label
                        @filter="workEXPToYearFilter"
                      >
                        <template v-slot:selected>
                          <div v-if="workEXPToYear">
                            <div
                              class="q-pa-sm br-4"
                              style="background: #e0e0e0 !important"
                            >
                              {{ workEXPToYear }}
                            </div>
                          </div>
                        </template>
                      </q-select>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Current Job -->

              <div class="q-my-md">
                <div class="q-px-sm">
                  <div class="text-grey-7">
                    <q-checkbox v-model="workEXPCurrentJob" />

                    <span> هنوز در این شرکت مشغول به کار هستم. </span>
                  </div>
                </div>
              </div>

              <!-- Achievements -->

              <div class="q-my-md">
                <div class="q-px-sm">
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
                      v-model="workEXPAchievements"
                      outlined
                      type="textarea"
                    />
                  </div>
                </div>
              </div>
            </div>
          </q-tab-panel>

          <q-tab-panel name="english" style="direction: ltr">
            <div class="q-pa-md">
              <!-- Job Title -->

              <div class="q-my-md">
                <div class="q-px-sm">
                  <div class="text-grey-7">
                    <span>Job Title</span>
                  </div>

                  <div class="q-pt-sm full-width">
                    <q-input outlined v-model="enWorkEXPJobTitle" />
                  </div>
                </div>
              </div>

              <!-- Job Category -->

              <div class="q-my-md">
                <div class="q-px-sm q-pt-sm">
                  <div class="text-grey-7">
                    <span>Job Category</span>
                  </div>

                  <div class="q-pt-sm full-width" style="direction: ltr">
                    <q-select
                      v-model="enWorkEXPWhatJobCategory"
                      :options="enWorkEXPOptionsWhatJob"
                      color="primary"
                      outlined
                      clearable
                      use-input
                      use-chips
                      stack-label
                      @filter="enWorkEXPWhatJobFilter"
                      input-debounce="0"
                    >
                      <template v-slot:selected>
                        <div v-if="enWorkEXPWhatJobCategory">
                          <div
                            class="q-pa-sm br-4"
                            style="background: #e0e0e0 !important"
                          >
                            {{ enWorkEXPWhatJobCategory }}
                          </div>
                        </div>
                      </template>
                    </q-select>
                  </div>
                </div>
              </div>

              <!-- Seniority Level -->

              <div class="q-my-md">
                <div class="col-6 q-px-sm q-pt-sm">
                  <div class="text-grey-7">
                    <span>Seniority Level</span>
                  </div>

                  <div class="q-pt-sm full-width" style="direction: ltr">
                    <q-select
                      v-model="enWorkEXPSeniorityLevel"
                      :options="enWorkEXPOptionsSeniorityLevel"
                      color="primary"
                      outlined
                      clearable
                      use-input
                      use-chips
                      stack-label
                      @filter="enWorkEXPSeniorityLevelFilter"
                      input-debounce="0"
                    >
                      <template v-slot:selected>
                        <div v-if="enWorkEXPSeniorityLevel">
                          <div
                            class="q-pa-sm br-4"
                            style="background: #e0e0e0 !important"
                          >
                            {{ enWorkEXPSeniorityLevel }}
                          </div>
                        </div>
                      </template>
                    </q-select>
                  </div>
                </div>
              </div>

              <!-- Company Name -->

              <div class="q-my-md">
                <div class="q-px-sm">
                  <div class="text-grey-7">
                    <span>Company Name</span>
                  </div>

                  <div class="q-pt-sm full-width">
                    <q-input outlined v-model="enWorkEXPCompanyName" />
                  </div>
                </div>
              </div>

              <!-- Industry (Optional) -->

              <div class="q-my-md">
                <div class="q-px-sm q-pt-sm">
                  <div class="text-grey-7">
                    <span>Industry (Optional) </span>
                  </div>

                  <div class="q-pt-sm full-width" style="direction: ltr">
                    <q-select
                      v-model="enWorkEXPIndustry"
                      :options="enWorkEXPIndustryOptions"
                      color="primary"
                      outlined
                      clearable
                      use-input
                      use-chips
                      stack-label
                      @filter="enWorkEXPIndustryFilter"
                      input-debounce="0"
                    >
                      <template v-slot:selected>
                        <div v-if="enWorkEXPIndustry">
                          <div
                            class="q-pa-sm br-4"
                            style="background: #e0e0e0 !important"
                          >
                            {{ enWorkEXPIndustry }}
                          </div>
                        </div>
                      </template>
                    </q-select>
                  </div>
                </div>
              </div>

              <!-- Country And City -->

              <div class="q-my-md">
                <div class="q-px-sm q-pt-sm">
                  <div class="col-6 q-px-sm row" style="direction: ltr">
                    <div class="col-6 q-pl-sm">
                      <div class="text-grey-7">
                        <span>Country </span>
                      </div>

                      <div class="full-width">
                        <q-select
                          v-model="enWorkEXPCountry"
                          :options="enWorkEXPCountryOptions"
                          color="primary"
                          outlined
                          clearable
                          use-input
                          use-chips
                          stack-label
                          @filter="enWorkEXPCountryFilter"
                          input-debounce="0"
                        >
                          <template v-slot:selected>
                            <div v-if="enWorkEXPCountry">
                              <div
                                class="q-pa-sm br-4"
                                style="background: #e0e0e0 !important"
                              >
                                {{ enWorkEXPCountry }}
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
                          v-model="enWorkEXPCity"
                          :options="enWorkEXPCityOptions"
                          color="primary"
                          outlined
                          clearable
                          use-input
                          use-chips
                          stack-label
                          @filter="enWorkEXPCityOptionsFilter"
                          input-debounce="0"
                        >
                          <template v-slot:selected>
                            <div v-if="enWorkEXPCity">
                              <div
                                class="q-pa-sm br-4"
                                style="background: #e0e0e0 !important"
                              >
                                {{ enWorkEXPCity }}
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

              <div class="q-my-md">
                <div class="q-px-sm q-pt-sm">
                  <div class="col-6 q-px-sm row" style="direction: ltr">
                    <div class="col-6 q-pl-sm">
                      <div class="text-grey-7">
                        <span>From Month </span>
                      </div>

                      <div class="full-width">
                        <q-select
                          v-model="enWorkEXPFromMonth"
                          :options="enWorkEXPFromMonthOptions"
                          color="primary"
                          outlined
                          clearable
                          use-input
                          use-chips
                          stack-label
                          @filter="enWorkEXPFromMonthFilter"
                          input-debounce="0"
                        >
                          <template v-slot:selected>
                            <div v-if="enWorkEXPFromMonth">
                              <div
                                class="q-pa-sm br-4"
                                style="background: #e0e0e0 !important"
                              >
                                {{ enWorkEXPFromMonth }}
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
                          v-model="enWorkEXPFromYear"
                          :options="enWorkEXPFromYearOptions"
                          color="primary"
                          outlined
                          clearable
                          use-input
                          use-chips
                          stack-label
                          @filter="enWorkEXPFromYearFilter"
                          input-debounce="0"
                        >
                          <template v-slot:selected>
                            <div v-if="enWorkEXPFromYear">
                              <div
                                class="q-pa-sm br-4"
                                style="background: #e0e0e0 !important"
                              >
                                {{ enWorkEXPFromYear }}
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

              <div v-if="!enWorkEXPCurrentJob" class="q-my-md">
                <div class="q-px-sm q-pt-sm">
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

              <div class="q-my-md">
                <div class="q-px-sm q-pt-sm">
                  <div class="text-grey-7">
                    <q-checkbox v-model="enWorkEXPCurrentJob" />

                    <span>It is my current job </span>
                  </div>
                </div>
              </div>

              <!-- Achievements -->

              <div class="q-my-md">
                <div class="q-px-sm q-mt-sm">
                  <div class="text-grey-7">
                    <span>Achievements (Optional) </span>
                  </div>

                  <div class="q-pt-sm full-width">
                    <q-input
                      maxlength="3000"
                      counter
                      v-model="enWorkEXPAchievements"
                      outlined
                      type="textarea"
                    />
                  </div>
                </div>
              </div>
            </div>
          </q-tab-panel>
        </q-tab-panels>

        <div
          class="full-width relative-position form-buttons flex justify-center items-center"
        >
          <div>
            <q-btn flat color="grey-7" label="انصراف" />

            <q-btn color="primary" label="ذخیره تغییرات" />
          </div>
        </div>
      </div>
    </q-dialog>

    <!-- Add Language And Level Dialog - Responsive -->

    <q-dialog v-model="addLangDialog">
      <div class="bg-white gt-sm" style="width: 600px !important">
        <div
          class="full-width relative-position row justify-center"
          style="height: 45px"
        >
          <div class="absolute-right q-pt-sm">
            <q-btn flat color="grey-6" @click="addLangDialog = false">
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
                  v-model="addLangName"
                  :options="addLangNameOptions"
                  color="primary"
                  outlined
                  clearable
                  use-input
                  use-chips
                  stack-label
                  @filter="addLangNamefilter"
                  input-debounce="0"
                >
                  <template v-slot:selected>
                    <div v-if="addLangName">
                      <div
                        class="q-pa-sm br-4"
                        style="background: #e0e0e0 !important"
                      >
                        {{ addLangName }}
                      </div>
                    </div>
                  </template>
                </q-select>
              </div>
            </div>

            <div class="col-6 q-px-sm">
              <div class="text-grey-7">
                <span>Language</span>
              </div>

              <div class="q-pt-sm full-width" style="direction: ltr">
                <q-select
                  v-model="enAddLangName"
                  :options="enAddLangNameOptions"
                  color="primary"
                  outlined
                  clearable
                  use-input
                  use-chips
                  stack-label
                  @filter="enAddLangNamefilter"
                  input-debounce="0"
                >
                  <template v-slot:selected>
                    <div v-if="enAddLangName">
                      <div
                        class="q-pa-sm br-4"
                        style="background: #e0e0e0 !important"
                      >
                        {{ enAddLangName }}
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
                  v-model="addLangSkill"
                  :options="addLangSkillOptions"
                  color="primary"
                  outlined
                  clearable
                  use-input
                  use-chips
                  stack-label
                  @filter="addLangSkillFilter"
                  input-debounce="0"
                >
                  <template v-slot:selected>
                    <div v-if="addLangSkill">
                      <div
                        class="q-pa-sm br-4"
                        style="background: #e0e0e0 !important"
                      >
                        {{ addLangSkill }}
                      </div>
                    </div>
                  </template>
                </q-select>
              </div>
            </div>

            <div class="col-6 q-px-sm">
              <div class="text-grey-7">
                <span>Skill Level</span>
              </div>

              <div class="q-pt-sm full-width" style="direction: ltr">
                <q-select
                  v-model="enAddLangSkill"
                  :options="enAddLangSkillOptions"
                  color="primary"
                  outlined
                  clearable
                  use-input
                  use-chips
                  stack-label
                  @filter="enAddLangSkillFilter"
                  input-debounce="0"
                >
                  <template v-slot:selected>
                    <div v-if="enAddLangSkill">
                      <div
                        class="q-pa-sm br-4"
                        style="background: #e0e0e0 !important"
                      >
                        {{ enAddLangSkill }}
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

      <div class="bg-white lt-md" style="width: 600px !important">
        <div>
          <div
            class="full-width relative-position row justify-center"
            style="height: 45px"
          >
            <div class="absolute-right q-pt-sm">
              <q-btn flat color="grey-6" @click="addLangDialog = false">
                <q-icon name="cancel" size="32px" />
              </q-btn>
            </div>

            <div class="absolute-center font-13 text-bold">افزودن زبان</div>
          </div>

          <div class="flex justify-center">
            <div class="q-my-sm" style="max-width: 240px">
              <q-tabs
                class="active-forms-tab-parent"
                active-class="active-forms-tab"
                indicator-color="transparent"
                v-model="addLangTabs"
                no-caps
              >
                <q-tab name="persian" label="فارسی" />
                <q-tab name="english" label="انگلیسی" />
              </q-tabs>
            </div>
          </div>

          <q-separator />
        </div>

        <q-tab-panels v-model="addLangTabs">
          <q-tab-panel name="persian">
            <div class="q-pa-md">
              <!-- Language -->

              <div class="q-my-md">
                <div class="q-px-sm">
                  <div class="text-grey-7">
                    <span>زبان </span>
                  </div>

                  <div class="q-pt-sm full-width">
                    <q-select
                      v-model="addLangName"
                      :options="addLangNameOptions"
                      color="primary"
                      outlined
                      clearable
                      use-input
                      use-chips
                      stack-label
                      @filter="addLangNameFilter"
                      input-debounce="0"
                    >
                      <template v-slot:selected>
                        <div v-if="addLangName">
                          <div
                            class="q-pa-sm br-4"
                            style="background: #e0e0e0 !important"
                          >
                            {{ addLangName }}
                          </div>
                        </div>
                      </template>
                    </q-select>
                  </div>
                </div>
              </div>

              <!-- Level -->

              <div class="q-my-md">
                <div class="q-px-sm">
                  <div class="text-grey-7">
                    <span>سطح مهارت </span>
                  </div>

                  <div class="q-pt-sm full-width">
                    <q-select
                      v-model="addLangSkill"
                      :options="addLangSkillOptions"
                      color="primary"
                      outlined
                      clearable
                      use-input
                      use-chips
                      stack-label
                      @filter="addLangSkillFilter"
                      input-debounce="0"
                    >
                      <template v-slot:selected>
                        <div v-if="addLangSkill">
                          <div
                            class="q-pa-sm br-4"
                            style="background: #e0e0e0 !important"
                          >
                            {{ addLangSkill }}
                          </div>
                        </div>
                      </template>
                    </q-select>
                  </div>
                </div>
              </div>
            </div>
          </q-tab-panel>

          <q-tab-panel name="english" style="direction: ltr">
            <div class="q-pa-md">
              <!-- Language -->

              <div class="q-my-md">
                <div class="q-px-sm">
                  <div class="text-grey-7">
                    <span>Language</span>
                  </div>

                  <div class="q-pt-sm full-width" style="direction: ltr">
                    <q-select
                      v-model="enAddLangName"
                      :options="enAddLangNameOptions"
                      color="primary"
                      outlined
                      clearable
                      use-input
                      use-chips
                      stack-label
                      @filter="enAddLangNameFilter"
                      input-debounce="0"
                    >
                      <template v-slot:selected>
                        <div v-if="enAddLangName">
                          <div
                            class="q-pa-sm br-4"
                            style="background: #e0e0e0 !important"
                          >
                            {{ enAddLangName }}
                          </div>
                        </div>
                      </template>
                    </q-select>
                  </div>
                </div>
              </div>

              <!-- Level -->

              <div class="q-my-md">
                <div class="q-px-sm">
                  <div class="text-grey-7">
                    <span>Skill Level</span>
                  </div>

                  <div class="q-pt-sm full-width" style="direction: ltr">
                    <q-select
                      v-model="enAddLangSkill"
                      :options="enAddLangSkillOptions"
                      color="primary"
                      outlined
                      clearable
                      use-input
                      use-chips
                      stack-label
                      @filter="enAddLangSkillFilter"
                      input-debounce="0"
                    >
                      <template v-slot:selected>
                        <div v-if="enAddLangSkill">
                          <div
                            class="q-pa-sm br-4"
                            style="background: #e0e0e0 !important"
                          >
                            {{ enAddLangSkill }}
                          </div>
                        </div>
                      </template>
                    </q-select>
                  </div>
                </div>
              </div>
            </div>
          </q-tab-panel>
        </q-tab-panels>

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

    <!-- Add Application Dialog - Responsive -->

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

          <div class="absolute-center text-h6 gt-sm text-bold">
            افزودن نرم افزار
          </div>

          <div class="absolute-center font-13 lt-md text-bold">
            افزودن نرم افزار
          </div>
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
    const shareLink = ref("jobvision.ir/cv/83836552-092743");
    const title = ref("دولوپر فول استک در شرکت آیترونیک");
    const linkedin = ref();
    const jobTitle = ref();

    // Dialogs Content

    const editAbout = reactive({
      editAboutTitle: "",
      editAboutLinkedin: "",
      editAboutDescription: "",

      // English Forms/Content

      enEditAboutTitle: "",
      enEditAboutDescription: "",
    });

    const infoDialog = reactive({
      infoName: "",
      infoLastName: "",
      infoGender: "",
      infoMaritalStatus: "",
      infoCity: "",
      infoMilitaryService: "",
      infoRegion: "",
      infoBirth: "",
      infoNumber: "",
      infoinfoExpectedSalary: "",
      infoJobCategory: "",

      // English Forms/Content

      enInfoName: "",
      enInfoLastName: "",
      enInfoGender: "",
      enInfoMaritalStatus: "",
      enInfoCity: "",
      enInfoMilitaryService: "",
      enInfoRegion: "",
      enInfoBirth: "",
      enInfoNumber: "",
      enInfoinfoExpectedSalary: "",
      enInfoJobCategory: "",
    });

    const workEXP = reactive({
      workEXPJobTitle: "",
      workEXPWhatJobCategory: "",
      workEXPSeniorityLevel: "",
      workEXPCompanyName: "",
      workEXPIndustry: "",
      workEXPCountry: "",
      workEXPCity: "",
      workEXPFromMonth: "",
      workEXPFromYear: "",
      workEXPToYear: "",
      workEXPToMonth: "",
      workEXPCurrentJob: "",
      workEXPAchievements: "",

      // English Forms/Content

      enWorkEXPJobTitle: "",
      enWorkEXPWhatJobCategory: "",
      enWorkEXPSeniorityLevel: "",
      enWorkEXPCompanyName: "",
      enWorkEXPIndustry: "",
      enWorkEXPCountry: "",
      enWorkEXPCity: "",
      enWorkEXPFromYear: "",
      enWorkEXPFromMonth: "",
      enWorkEXPToYear: "",
      enWorkEXPToMonth: "",
      enWorkEXPCurrentJob: "",
      enWorkEXPAchievements: "",
    });

    const addLang = reactive({
      addLangName: "",
      addLangSkill: "",

      // English Forms/Content

      enAddLangName: "",
      enAddLangSkill: "",
    });

    // End of Dialogs Content

    // Checkbox Models EN/FA

    const infoForeigner = ref(false);
    const infoDisability = ref(false);
    const enInfoForeigner = ref(false);
    const enInfoDisability = ref(false);

    // Start Of Options EN/FA

    const infoOptionsCity = ref([
      "Google",
      "Facebook",
      "Twitter",
      "Apple",
      "Oracle",
    ]);

    const infoOptionJobCategory = ref([
      "Google",
      "Facebook",
      "Twitter",
      "Apple",
      "Oracle",
    ]);

    const workEXPOptionsWhatJob = ref([
      "Google",
      "Facebook",
      "Twitter",
      "Apple",
      "Oracle",
    ]);

    const workEXPOptionsSeniorityLevel = ref([
      "Google",
      "Facebook",
      "Twitter",
      "Apple",
      "Oracle",
    ]);

    const workEXPIndustryOptions = ref([
      "Google",
      "Facebook",
      "Twitter",
      "Apple",
      "Oracle",
    ]);

    const workEXPCountryOptions = ref([
      "Google",
      "Facebook",
      "Twitter",
      "Apple",
      "Oracle",
    ]);

    const workEXPCityOptions = ref([
      "Google",
      "Facebook",
      "Twitter",
      "Apple",
      "Oracle",
    ]);

    const workEXPFromMonthOptions = ref([
      "Google",
      "Facebook",
      "Twitter",
      "Apple",
      "Oracle",
    ]);

    const workEXPFromYearOptions = ref([
      "Google",
      "Facebook",
      "Twitter",
      "Apple",
      "Oracle",
    ]);

    const workEXPToMonthOptions = ref([
      "Google",
      "Facebook",
      "Twitter",
      "Apple",
      "Oracle",
    ]);

    const workEXPToYearOptions = ref([
      "Google",
      "Facebook",
      "Twitter",
      "Apple",
      "Oracle",
    ]);

    const addLangNameOptions = ref([
      "Google",
      "Facebook",
      "Twitter",
      "Apple",
      "Oracle",
    ]);

    const addLangSkillOptions = ref([
      "Google",
      "Facebook",
      "Twitter",
      "Apple",
      "Oracle",
    ]);

    // English Options

    const enInfoOptionsCity = ref([
      "Google",
      "Facebook",
      "Twitter",
      "Apple",
      "Oracle",
    ]);

    const enInfoOptionJobCategory = ref([
      "Google",
      "Facebook",
      "Twitter",
      "Apple",
      "Oracle",
    ]);

    const enWorkEXPOptionsWhatJob = ref([
      "Google",
      "Facebook",
      "Twitter",
      "Apple",
      "Oracle",
    ]);

    const enWorkEXPOptionsSeniorityLevel = ref([
      "Google",
      "Facebook",
      "Twitter",
      "Apple",
      "Oracle",
    ]);

    const enWorkEXPIndustryOptions = ref([
      "Google",
      "Facebook",
      "Twitter",
      "Apple",
      "Oracle",
    ]);

    const enWorkEXPCountryOptions = ref([
      "Google",
      "Facebook",
      "Twitter",
      "Apple",
      "Oracle",
    ]);

    const enWorkEXPCityOptions = ref([
      "Google",
      "Facebook",
      "Twitter",
      "Apple",
      "Oracle",
    ]);

    const enWorkEXPFromMonthOptions = ref([
      "Google",
      "Facebook",
      "Twitter",
      "Apple",
      "Oracle",
    ]);

    const enWorkEXPFromYearOptions = ref([
      "Google",
      "Facebook",
      "Twitter",
      "Apple",
      "Oracle",
    ]);

    const enWorkEXPToMonthOptions = ref([
      "Google",
      "Facebook",
      "Twitter",
      "Apple",
      "Oracle",
    ]);

    const enWorkEXPToYearOptions = ref([
      "Google",
      "Facebook",
      "Twitter",
      "Apple",
      "Oracle",
    ]);

    const enAddLangNameOptions = ref([
      "Google",
      "Facebook",
      "Twitter",
      "Apple",
      "Oracle",
    ]);

    const enAddLangSkillOptions = ref([
      "Google",
      "Facebook",
      "Twitter",
      "Apple",
      "Oracle",
    ]);

    // End Of Options

    const searchApp = ref("");
    const addLangTabs = ref("persian");
    const editAboutTabs = ref("persian");
    const basicInfomationTabs = ref("persian");
    const createExperienceTabs = ref("persian");

    // Dialogs List

    const share = ref(false);
    const openList = ref(false);
    const editPicture = ref(false);
    const information = ref(false);
    const editAboutForm = ref(false);
    const createWorkExperience = ref(false);

    // Dialogs Content

    const showBirth = ref(false);
    const showCalender = ref(false);
    const showENCalender = ref(false);
    const currentJob = ref(false);
    const addLangDialog = ref(false);
    const addApplication = ref(false);

    // Functions

    function copyLink() {
      navigator.clipboard.writeText(shareLink.value);

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

      infoDialog.infoBirth = dateTime;
    }

    // Check On App Load

    onMounted(() => {
      getDate();
    });

    return {
      title,
      share,
      jobTitle,
      linkedin,
      copyLink,
      openList,
      shareLink,
      searchApp,
      showBirth,
      currentJob,
      addLangTabs,
      information,
      editPicture,
      showCalender,
      infoForeigner,
      editAboutTabs,
      addLangDialog,
      editAboutForm,
      showENCalender,
      addApplication,
      infoDisability,
      infoOptionsCity,
      enInfoForeigner,
      enInfoDisability,
      enInfoOptionsCity,
      workEXPCityOptions,
      addLangNameOptions,
      basicInfomationTabs,
      addLangSkillOptions,
      workEXPToYearOptions,
      createWorkExperience,
      enWorkEXPCityOptions,
      createExperienceTabs,
      enAddLangNameOptions,
      enAddLangSkillOptions,
      workEXPToMonthOptions,
      workEXPOptionsWhatJob,
      infoOptionJobCategory,
      workEXPCountryOptions,
      workEXPFromYearOptions,
      workEXPIndustryOptions,
      enWorkEXPToYearOptions,
      enWorkEXPToMonthOptions,
      enWorkEXPCountryOptions,
      workEXPFromMonthOptions,
      enInfoOptionJobCategory,
      enWorkEXPOptionsWhatJob,
      enWorkEXPIndustryOptions,
      enWorkEXPFromYearOptions,
      enWorkEXPFromMonthOptions,
      workEXPOptionsSeniorityLevel,
      enWorkEXPOptionsSeniorityLevel,

      // Import Dialog Content

      ...toRefs(editAbout, infoDialog, workEXP, addLang),

      // Filters For Persian Content

      filterCity(val, update) {
        update(() => {
          const needle = val.toLowerCase();
          infoOptionsCity.value = infoOptionsCity.value.filter(
            (v) => v.toLowerCase().indexOf(needle) > -1
          );
        });
      },

      filterJobs(val, update) {
        update(() => {
          const needle = val.toLowerCase();
          InfoOptionJobCategory.value = InfoOptionJobCategory.value.filter(
            (v) => v.toLowerCase().indexOf(needle) > -1
          );
        });
      },

      workEXPFilterWhatJobs(val, update) {
        update(() => {
          const needle = val.toLowerCase();
          whatJobOptions.value = whatJobOptions.value.filter(
            (v) => v.toLowerCase().indexOf(needle) > -1
          );
        });
      },

      workEXPFilterSeniorityLevel(val, update) {
        update(() => {
          const needle = val.toLowerCase();
          seniorityLevelOptions.value = seniorityLevelOptions.value.filter(
            (v) => v.toLowerCase().indexOf(needle) > -1
          );
        });
      },

      workEXPFromMonthFilter(val, update) {
        update(() => {
          const needle = val.toLowerCase();
          workEXPFromMonthOptions.value = workEXPFromMonthOptions.value.filter(
            (v) => v.toLowerCase().indexOf(needle) > -1
          );
        });
      },

      workEXPFromYearFilter(val, update) {
        update(() => {
          const needle = val.toLowerCase();
          workEXPFromYearOptions.value = workEXPFromYearOptions.value.filter(
            (v) => v.toLowerCase().indexOf(needle) > -1
          );
        });
      },

      workEXPToMonthFilter(val, update) {
        update(() => {
          const needle = val.toLowerCase();
          workEXPToMonthOptions.value = workEXPToMonthOptions.value.filter(
            (v) => v.toLowerCase().indexOf(needle) > -1
          );
        });
      },

      workEXPToYearFilter(val, update) {
        update(() => {
          const needle = val.toLowerCase();
          workEXPToYearOptions.value = workEXPToYearOptions.value.filter(
            (v) => v.toLowerCase().indexOf(needle) > -1
          );
        });
      },

      filterLang(val, update) {
        update(() => {
          const needle = val.toLowerCase();
          addLangNameOptions.value = addLangNameOptions.value.filter(
            (v) => v.toLowerCase().indexOf(needle) > -1
          );
        });
      },

      filterLangSkill(val, update) {
        update(() => {
          const needle = val.toLowerCase();
          addLangSkillFilter.value = addLangSkillFilter.value.filter(
            (v) => v.toLowerCase().indexOf(needle) > -1
          );
        });
      },

      // Filters For English Content

      enFilterCity(val, update) {
        update(() => {
          const needle = val.toLowerCase();
          enInfoOptionsCity.value = enInfoOptionsCity.value.filter(
            (v) => v.toLowerCase().indexOf(needle) > -1
          );
        });
      },

      enFilterJobs(val, update) {
        update(() => {
          const needle = val.toLowerCase();
          enInfoOptionJobCategory.value = enInfoOptionJobCategory.value.filter(
            (v) => v.toLowerCase().indexOf(needle) > -1
          );
        });
      },

      enWorkEXPFilterWhatJobs(val, update) {
        update(() => {
          const needle = val.toLowerCase();
          enWorkEXPOptionsWhatJob.value = enWorkEXPOptionsWhatJob.value.filter(
            (v) => v.toLowerCase().indexOf(needle) > -1
          );
        });
      },

      enWorkEXPFilterIndustryOptions(val, update) {
        update(() => {
          const needle = val.toLowerCase();
          enWorkEXPIndustryOptions.value =
            enWorkEXPIndustryOptions.value.filter(
              (v) => v.toLowerCase().indexOf(needle) > -1
            );
        });
      },

      enWorkEXPFilterCountry(val, update) {
        update(() => {
          const needle = val.toLowerCase();
          enWorkEXPCountryOptions.value = enWorkEXPCountryOptions.value.filter(
            (v) => v.toLowerCase().indexOf(needle) > -1
          );
        });
      },

      enWorkEXPFilterCity(val, update) {
        update(() => {
          const needle = val.toLowerCase();
          enWorkEXPCityOptions.value = enWorkEXPCityOptions.value.filter(
            (v) => v.toLowerCase().indexOf(needle) > -1
          );
        });
      },

      enWorkEXPFilterSeniorityLevel(val, update) {
        update(() => {
          const needle = val.toLowerCase();
          enWorkEXPOptionsSeniorityLevel.value =
            enWorkEXPOptionsSeniorityLevel.value.filter(
              (v) => v.toLowerCase().indexOf(needle) > -1
            );
        });
      },

      enWorkEXPFromMonthFilter(val, update) {
        update(() => {
          const needle = val.toLowerCase();
          enWorkEXPFromMonthOptions.value =
            enWorkEXPFromMonthOptions.value.filter(
              (v) => v.toLowerCase().indexOf(needle) > -1
            );
        });
      },

      enWorkEXPFromYearFilter(val, update) {
        update(() => {
          const needle = val.toLowerCase();
          enWorkEXPFromYearOptions.value =
            enWorkEXPFromYearOptions.value.filter(
              (v) => v.toLowerCase().indexOf(needle) > -1
            );
        });
      },

      enWorkEXPToMonthFilter(val, update) {
        update(() => {
          const needle = val.toLowerCase();
          enWorkEXPToMonthOptions.value = enWorkEXPToMonthOptions.value.filter(
            (v) => v.toLowerCase().indexOf(needle) > -1
          );
        });
      },

      enWorkEXPToYearFilter(val, update) {
        update(() => {
          const needle = val.toLowerCase();
          enWorkEXPToYearOptions.value = enWorkEXPToYearOptions.value.filter(
            (v) => v.toLowerCase().indexOf(needle) > -1
          );
        });
      },

      enFilterLang(val, update) {
        update(() => {
          const needle = val.toLowerCase();
          enAddLangNameOptions.value = enAddLangNameOptions.value.filter(
            (v) => v.toLowerCase().indexOf(needle) > -1
          );
        });
      },

      enFilterLangSkill(val, update) {
        update(() => {
          const needle = val.toLowerCase();
          enAddLangSkillOptions.value = enAddLangSkillOptions.value.filter(
            (v) => v.toLowerCase().indexOf(needle) > -1
          );
        });
      },

      // End Of Filters
    };
  },
};
</script>

<!-- Styles -->

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

.active-forms-tab-parent {
  width: 240px;
  background-color: #f1f1f1;
  padding: 3px;
  border-radius: 40px;
  margin: auto;
}

.active-forms-tab {
  color: #fff;
  background-color: #45c26f;
  border-radius: 40px;
}

.q-tab {
  transition: none !important;
}

.form-buttons {
  height: 70px;
  box-shadow: 0 1rem 3rem #0000002d !important;
}

body.platform-ios .q-dialog__inner--minimized > div,
body.platform-android:not(.native-mobile) .q-dialog__inner--minimized > div {
  max-height: none;
}

.font-13 {
  font-size: 13px;
}
</style>
