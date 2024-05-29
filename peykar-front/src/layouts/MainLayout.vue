<template>
  <q-layout view="hHh lpR fFf">
    <!-- Header -->

    <q-header class="row justify-center shadow q-px-md" style="height: 70px">
      <q-toolbar class="col-md-12 col-lg-8 col-xl-8 gt-sm">
        <!-- Logo And Links -->

        <div class="col-8 row">
          <img
            class="q-mr-lg"
            src="https://jobvision.ir/assets/images/header/logo-bg-white.svg"
            @click="$router.push('/')"
          />

          <div>
            <q-btn
              flat
              label="فرصت های شغلی"
              to="/jobs"
              class="btn--no-hover button-effect"
            />

            <q-btn
              flat
              label="رزومه من"
              v-if="user"
              to="/my-cv"
              class="btn--no-hover"
            />

            <q-btn
              flat
              label="رده‌بندی شرکت‌ها"
              to="/top-companies"
              class="btn--no-hover"
            />
          </div>
        </div>

        <q-toolbar-title v-if="user" class="col-3 row justify-end">
          <!-- Notification Button -->

          <q-btn round flat>
            <q-icon
              @click="$router.push('/notifications')"
              size="24px"
              name="notifications"
            />
          </q-btn>

          <q-btn-dropdown flat color="grey-7" icon="person" padding="8px 20px">
            <div class="q-pa-md text-black row">
              <div class="col-12">
                <q-item class="full-width">
                  <q-item-section top avatar>
                    <q-avatar size="50px" color="grey-4">
                      <q-icon name="person" color="grey-7" size="69px" />
                    </q-avatar>
                  </q-item-section>

                  <!-- Full Name, Job And Edit Button -->

                  <q-item-section>
                    <q-item-label v-if="user.name">{{
                      user.name
                    }}</q-item-label>

                    <q-item-label v-else>
                      <q-btn flat label="افزودن نام" @click="toggleDialog" />
                    </q-item-label>

                    <q-item-label lines="2">
                      <div class="text-black q-mt-sm" style="font-size: 12px">
                        دولوپر فول استک در شرکت آیترونیک.
                      </div>

                      <q-btn flat>
                        <q-icon size="20px" name="edit" />
                      </q-btn>
                    </q-item-label>
                  </q-item-section>
                </q-item>

                <div>
                  <q-btn
                    class="full-width text-bold"
                    outline
                    to="/my-cv"
                    color="black"
                    label="رزومه من"
                    icon="badge"
                  />
                </div>
              </div>
            </div>

            <q-list class="q-px-md">
              <q-item clickable v-ripple>
                <q-item-section avatar>
                  <q-icon name="hotel_class" />
                </q-item-section>
                <q-item-section>مشاغل پیشنهادی</q-item-section>
                <div class="q-mx-lg"></div>
                <q-item-section side>
                  <q-badge
                    class="text-bold"
                    color="green-2"
                    text-color="green-8"
                    label="31"
                  />
                </q-item-section>
              </q-item>

              <q-item clickable v-ripple>
                <q-item-section avatar>
                  <q-icon name="drive_folder_upload" />
                </q-item-section>
                <q-item-section>رزومه های ارسال شده</q-item-section>
                <div class="q-mx-lg"></div>
              </q-item>

              <q-item clickable v-ripple>
                <q-item-section avatar>
                  <q-icon name="favorite_outline" />
                </q-item-section>
                <q-item-section>مشاغل نشان شده</q-item-section>
                <div class="q-mx-lg"></div>
              </q-item>

              <q-item clickable v-ripple>
                <q-item-section avatar>
                  <q-icon name="saved_search" />
                </q-item-section>
                <q-item-section>جستجو های ذخیره شده</q-item-section>
                <div class="q-mx-lg"></div>
                <q-item-section side>1</q-item-section>
              </q-item>

              <q-item clickable v-ripple>
                <q-item-section avatar>
                  <q-icon name="apartment" />
                </q-item-section>
                <q-item-section>شرکت های دنبال شده</q-item-section>
                <div class="q-mx-lg"></div>
              </q-item>

              <q-item clickable v-ripple>
                <q-item-section avatar>
                  <q-icon name="school" />
                </q-item-section>
                <q-item-section>دوره های آموزشی پیشنهادی</q-item-section>
                <div class="q-mx-lg"></div>
              </q-item>

              <q-item clickable v-ripple>
                <q-item-section avatar>
                  <q-icon name="business_center" />
                </q-item-section>
                <q-item-section>نمایشگاه کار</q-item-section>
                <div class="q-mx-lg"></div>
              </q-item>

              <q-item clickable v-ripple>
                <q-item-section avatar>
                  <q-icon name="settings" />
                </q-item-section>
                <q-item-section>تنظیمات ناحیه کاربری</q-item-section>
              </q-item>

              <q-separator />

              <q-item class="text-red" @click="logout" clickable v-ripple>
                <q-item-section avatar>
                  <q-icon name="logout " />
                </q-item-section>
                <q-item-section>خروج از حساب</q-item-section>
              </q-item>
            </q-list>
          </q-btn-dropdown>
        </q-toolbar-title>

        <q-toolbar-title v-else class="col-4 row justify-end">
          <q-btn
            color="grey-4"
            icon="login"
            class="text-black text-bold"
            label="ورود | ثبت نام"
            to="account"
            style="font-size: 13px"
          />

          <q-separator class="q-mx-md" vertical inset />

          <q-btn flat label="بخش کارفرمایان" to="employer" />
        </q-toolbar-title>
      </q-toolbar>

      <q-toolbar class="col-12 lt-md" style="max-height: 70px">
        <!-- Logo And Links -->

        <div class="row">
          <q-btn
            flat
            @click="drawer = !drawer"
            class="btn--no-hover button-effect"
            icon="menu"
          />

          <img
            class="q-pl-md"
            src="https://jobvision.ir/assets/images/header/logo-bg-white.svg"
            style="width: 90px"
            @click="$router.push('/')"
          />
        </div>

        <q-toolbar-title v-if="user" class="row justify-end">
          <!-- Notification Button -->

          <q-btn round flat>
            <q-icon
              @click="$router.push('/notifications')"
              size="24px"
              name="notifications"
            />
          </q-btn>

          <q-btn-dropdown flat color="grey-7" icon="person">
            <div class="q-pa-md text-black row">
              <div class="col-12">
                <q-item class="full-width">
                  <q-item-section top avatar>
                    <q-avatar size="50px" color="grey-4">
                      <q-icon name="person" color="grey-7" size="69px" />
                    </q-avatar>
                  </q-item-section>

                  <!-- Full Namem, Job And Edit Button -->

                  <q-item-section>
                    <q-item-label v-if="user.name">
                      {{ user.name }}
                    </q-item-label>

                    <q-item-label v-else>
                      <q-btn flat label="افزودن نام" @click="toggleDialog" />
                    </q-item-label>

                    <q-item-label lines="2">
                      <div class="text-black q-mt-sm" style="font-size: 12px">
                        دولوپر فول استک در شرکت آیترونیک.
                      </div>

                      <q-btn flat>
                        <q-icon size="20px" name="edit" />
                      </q-btn>
                    </q-item-label>
                  </q-item-section>
                </q-item>

                <div>
                  <q-btn
                    class="full-width text-bold"
                    outline
                    to="/my-cv"
                    color="black"
                    label="رزومه من"
                    icon="badge"
                  />
                </div>
              </div>
            </div>

            <q-list class="q-px-md">
              <q-item clickable v-ripple>
                <q-item-section avatar>
                  <q-icon name="hotel_class" />
                </q-item-section>
                <q-item-section>مشاغل پیشنهادی</q-item-section>
                <div class="q-mx-lg"></div>
                <q-item-section side>
                  <q-badge
                    class="text-bold"
                    color="green-2"
                    text-color="green-8"
                    label="31"
                  />
                </q-item-section>
              </q-item>

              <q-item clickable v-ripple>
                <q-item-section avatar>
                  <q-icon name="drive_folder_upload" />
                </q-item-section>
                <q-item-section>رزومه های ارسال شده</q-item-section>
                <div class="q-mx-lg"></div>
              </q-item>

              <q-item clickable v-ripple>
                <q-item-section avatar>
                  <q-icon name="favorite_outline" />
                </q-item-section>
                <q-item-section>مشاغل نشان شده</q-item-section>
                <div class="q-mx-lg"></div>
              </q-item>

              <q-item clickable v-ripple>
                <q-item-section avatar>
                  <q-icon name="saved_search" />
                </q-item-section>
                <q-item-section>جستجو های ذخیره شده</q-item-section>
                <div class="q-mx-lg"></div>
                <q-item-section side>1</q-item-section>
              </q-item>

              <q-item clickable v-ripple>
                <q-item-section avatar>
                  <q-icon name="apartment" />
                </q-item-section>
                <q-item-section>شرکت های دنبال شده</q-item-section>
                <div class="q-mx-lg"></div>
              </q-item>

              <q-item clickable v-ripple>
                <q-item-section avatar>
                  <q-icon name="school" />
                </q-item-section>
                <q-item-section>دوره های آموزشی پیشنهادی</q-item-section>
                <div class="q-mx-lg"></div>
              </q-item>

              <q-item clickable v-ripple>
                <q-item-section avatar>
                  <q-icon name="business_center" />
                </q-item-section>
                <q-item-section>نمایشگاه کار</q-item-section>
                <div class="q-mx-lg"></div>
              </q-item>

              <q-item clickable v-ripple>
                <q-item-section avatar>
                  <q-icon name="settings" />
                </q-item-section>
                <q-item-section>تنظیمات ناحیه کاربری</q-item-section>
              </q-item>

              <q-separator />

              <q-item class="text-red" @click="logout" clickable v-ripple>
                <q-item-section avatar>
                  <q-icon name="logout " />
                </q-item-section>
                <q-item-section>خروج از حساب</q-item-section>
              </q-item>
            </q-list>
          </q-btn-dropdown>
        </q-toolbar-title>

        <q-toolbar-title v-else class="row justify-end">
          <q-btn
            color="grey-4"
            icon="login"
            class="text-black text-bold"
            label="ورود | ثبت نام"
            to="account"
            style="font-size: 13px"
          />
        </q-toolbar-title>
      </q-toolbar>
    </q-header>

    <q-dialog v-model="addName">
      <div class="relative-position bg-white q-pa-md" style="width: 600px">
        <div class="absolute-right q-pt-xs">
          <q-btn flat color="grey-6" icon="cancel" @click="share = false" />
        </div>

        <div class="full-width q-my-md">
          <span class="text-grey-7">نام و نام خانوادگی</span>

          <div class="row justify-between q-my-sm q-px-xs">
            <div
              class="col-xs-12 col-sm-9 col-md-9 col-lg-9 col-xl-9 q-px-sm q-mt-sm"
            >
              <q-input outlined color="grey-5" v-model="user_name" />
            </div>

            <div
              class="col-xs-12 col-sm-3 col-md-3 col-lg-3 col-xl-3 q-px-sm q-mt-sm text-center row"
            >
              <q-btn
                class="col-xs-12 col-sm-12"
                outline
                color="primary"
                label="تغییر"
                @click="changeName"
              />
            </div>
          </div>
        </div>
      </div>
    </q-dialog>

    <!-- Drawer for Tablet And Mobile -->

    <q-drawer
      v-model="drawer"
      behavior="mobile"
      show-if-above
      :mini="!drawer || miniState"
      @click.capture="drawerClick"
      :breakpoint="500"
      :width="width"
      no-swipe-open
    >
      <div class="row q-px-md">
        <div class="full-width row">
          <q-tab-panels animated v-model="tab">
            <q-tab-panel name="default">
              <!-- Header -->

              <div class="full-width row justify-between q-py-md">
                <div class="col-6">
                  <img
                    src="https://jobvision.ir/assets/images/header/logo-bg-white.svg"
                    @click="$router.push('/')"
                  />
                </div>

                <div class="col-6 flex justify-end">
                  <q-btn
                    flat
                    @click="drawer = !drawer"
                    class="btn--no-hover button-effect"
                    icon="close"
                  />
                </div>
              </div>

              <!-- Content -->

              <div class="row full-width">
                <div @click="tab = 'jobs'" class="col-12 row justify-between">
                  <div class="col-6">
                    <q-btn flat class="btn--no-hover q-my-sm button-effect">
                      <span class="text-bold">فرصت های شغلی</span>
                    </q-btn>
                  </div>

                  <div class="col-6 flex justify-end">
                    <q-btn flat>
                      <q-icon name="arrow_back_ios" size="16px" />
                    </q-btn>
                  </div>
                </div>

                <div class="col-12">
                  <q-btn
                    flat
                    to="/recommended-jobs"
                    class="btn--no-hover col-6 q-my-sm button-effect"
                  >
                    <span class="text-bold">فرصت های شغلی پیشنهادی</span>
                  </q-btn>
                </div>

                <div class="col-12" v-if="user">
                  <q-btn flat to="/my-cv" class="btn--no-hover col-6 q-my-sm">
                    <span class="text-bold">رزومه من</span>
                  </q-btn>
                </div>

                <div class="col-12">
                  <q-btn
                    flat
                    to="/top-companies"
                    class="btn--no-hover col-6 q-my-sm"
                  >
                    <span class="text-bold">رده‌بندی شرکت‌ها</span>
                  </q-btn>
                </div>

                <div class="col-12">
                  <q-btn
                    dense
                    color="accent"
                    to="/jobfair"
                    class="btn--no-hover col-6 q-my-sm"
                  >
                    <span class="text-bold text-white q-py-xs"
                      >دومین نمایشگاه کار اصفهان</span
                    >
                  </q-btn>
                </div>
              </div>
            </q-tab-panel>

            <q-tab-panel name="jobs">
              <!-- Header -->

              <div class="full-width row justify-between q-py-md">
                <div class="col-6" @click="tab = 'default'">
                  <q-icon name="arrow_forward_ios" size="16px" />

                  <q-btn class="text-bold" flat label="منوی اصلی"> </q-btn>
                </div>

                <div class="col-6 flex justify-end">
                  <q-btn
                    flat
                    @click="drawer = !drawer"
                    class="btn--no-hover button-effect"
                    icon="close"
                  />
                </div>
              </div>

              <!-- Content -->

              <div class="full-width row">
                <div class="col-12 row justify-between">
                  <div class="col-6">
                    <q-btn flat class="btn--no-hover q-my-sm button-effect">
                      <span class="text-bold text-primary">فرصت های شغلی</span>
                    </q-btn>
                  </div>

                  <div class="col-6 flex justify-end">
                    <q-btn flat />
                  </div>
                </div>

                <div
                  @click="tab = 'jobsList'"
                  class="col-12 row justify-between"
                >
                  <div class="col-6">
                    <q-btn flat class="btn--no-hover q-my-sm button-effect">
                      <span class="text-bold">پربازدیدترین شغل ها</span>
                    </q-btn>
                  </div>

                  <div class="col-6 flex justify-end">
                    <q-btn flat>
                      <q-icon name="arrow_back_ios" size="16px" />
                    </q-btn>
                  </div>
                </div>

                <div
                  @click="tab = 'provincesAndCities'"
                  class="col-12 row justify-between"
                >
                  <div class="col-6">
                    <q-btn flat class="btn--no-hover q-my-sm button-effect">
                      <span class="text-bold">استان و شهر</span>
                    </q-btn>
                  </div>

                  <div class="col-6 flex justify-end">
                    <q-btn flat>
                      <q-icon name="arrow_back_ios" size="16px" />
                    </q-btn>
                  </div>
                </div>

                <div
                  @click="tab = 'cooperationType'"
                  class="col-12 row justify-between"
                >
                  <div class="col-6">
                    <q-btn flat class="btn--no-hover q-my-sm button-effect">
                      <span class="text-bold">نوع همکاری</span>
                    </q-btn>
                  </div>

                  <div class="col-6 flex justify-end">
                    <q-btn flat>
                      <q-icon name="arrow_back_ios" size="16px" />
                    </q-btn>
                  </div>
                </div>

                <div
                  @click="tab = 'topCompanies'"
                  class="col-12 row justify-between"
                >
                  <div class="col-6">
                    <q-btn flat class="btn--no-hover q-my-sm button-effect">
                      <span class="text-bold">گزیده ای از سازمان ها</span>
                    </q-btn>
                  </div>

                  <div class="col-6 flex justify-end">
                    <q-btn flat>
                      <q-icon name="arrow_back_ios" size="16px" />
                    </q-btn>
                  </div>
                </div>
              </div>
            </q-tab-panel>

            <q-tab-panel class="full-width" name="jobsList">
              <!-- Header -->

              <div class="full-width row justify-between q-py-md">
                <div class="col-6" @click="tab = 'jobs'">
                  <q-icon name="arrow_forward_ios" size="16px" />

                  <q-btn class="text-bold" flat label="فرصت های شغلی" />
                </div>

                <div class="col-6 flex justify-end">
                  <q-btn
                    flat
                    @click="drawer = !drawer"
                    class="btn--no-hover button-effect"
                    icon="close"
                  />
                </div>
              </div>

              <!-- Content -->

              <!-- Change To Component -->

              <div class="full-width row">
                <div class="col-12 row justify-between">
                  <div class="col-12">
                    <q-btn flat class="btn--no-hover q-my-sm button-effect">
                      <span class="text-bold text-primary"
                        >همه فرصت های شغلی</span
                      >
                    </q-btn>
                  </div>
                </div>

                <div class="full-width">
                  <q-btn to="" flat>
                    <span class="border-left"></span>
                    <span class="text-bold q-pl-md">حسابدار/مالی و...</span>
                  </q-btn>

                  <div class="q-pl-md">
                    <div>
                      <q-btn label="مدیر مالی" to="" flat />
                    </div>

                    <div>
                      <q-btn label="رییس حسابداری" to="" flat />
                    </div>

                    <div>
                      <q-btn label="کمک حسابدار" to="" flat />
                    </div>

                    <div>
                      <q-btn label="حسابرس" to="" flat />
                    </div>
                  </div>
                </div>

                <div class="full-width">
                  <q-btn to="" flat>
                    <span class="border-left"></span>
                    <span class="text-bold q-pl-md"
                      >معامله گر و تحلیل گر بازار های مالی</span
                    >
                  </q-btn>
                </div>

                <div class="full-width">
                  <q-btn to="" flat>
                    <span class="border-left"></span>
                    <span class="text-bold q-pl-md"
                      >منشی و مسئول دفتر / امور اداری</span
                    >
                  </q-btn>
                </div>

                <div class="full-width">
                  <q-btn to="" flat>
                    <span class="border-left"></span>
                    <span class="text-bold q-pl-md">منابع انسانی</span>
                  </q-btn>
                </div>

                <div class="full-width">
                  <q-btn to="" flat>
                    <span class="border-left"></span>
                    <span class="text-bold q-pl-md"
                      >فروش و بازاریابی - کارشناس و مدیر</span
                    >
                  </q-btn>
                </div>

                <div class="full-width">
                  <q-btn to="" flat>
                    <span class="border-left"></span>
                    <span class="text-bold q-pl-md"
                      >فروشنده / بازاریاب / صندوقدار</span
                    >
                  </q-btn>
                </div>

                <div class="full-width">
                  <q-btn to="" flat>
                    <span class="border-left"></span>
                    <span class="text-bold q-pl-md"
                      >نماینده عملی (Med Rep)</span
                    >
                  </q-btn>
                </div>

                <div class="full-width">
                  <q-btn to="" flat>
                    <span class="border-left"></span>
                    <span class="text-bold q-pl-md"
                      >پشتیبانی و ارتباط با مشتریان</span
                    >
                  </q-btn>
                </div>

                <div class="full-width">
                  <q-btn to="" flat>
                    <span class="border-left"></span>
                    <span class="text-bold q-pl-md">روابط عمومی</span>
                  </q-btn>
                </div>

                <div class="full-width">
                  <q-btn to="" flat>
                    <span class="border-left"></span>
                    <span class="text-bold q-pl-md">دیجیتال مارکتینگ</span>
                  </q-btn>
                </div>

                <div class="full-width">
                  <q-btn to="" flat>
                    <span class="border-left"></span>
                    <span class="text-bold q-pl-md">سئو</span>
                  </q-btn>
                </div>

                <div class="full-width">
                  <q-btn to="" flat>
                    <span class="border-left"></span>
                    <span class="text-bold q-pl-md">تولید محتوا</span>
                  </q-btn>
                </div>

                <div class="full-width">
                  <q-btn to="" flat>
                    <span class="border-left"></span>
                    <span class="text-bold q-pl-md">ترجمه</span>
                  </q-btn>
                </div>

                <div class="full-width">
                  <q-btn to="" flat>
                    <span class="border-left"></span>
                    <span class="text-bold q-pl-md"
                      >برنامه نویسی و توسعه نرم افزار</span
                    >
                  </q-btn>

                  <div class="q-pl-md">
                    <div>
                      <q-btn label="برنامه نویس پایتون" to="" flat />
                    </div>

                    <div>
                      <q-btn label="برنامه نویس جاوا" to="" flat />
                    </div>

                    <div>
                      <q-btn label="برنامه نویس .Net" to="" flat />
                    </div>

                    <div>
                      <q-btn label="برنامه نویس php" to="" flat />
                    </div>

                    <div>
                      <q-btn label="برنامه نویس node.Js" to="" flat />
                    </div>

                    <div>
                      <q-btn label="برنامه نویس C++" to="" flat />
                    </div>

                    <div>
                      <q-btn label="برنامه نویس فرانت اند" to="" flat />
                    </div>

                    <div>
                      <q-btn label="برنامه نویس React" to="" flat />
                    </div>

                    <div>
                      <q-btn label="برنامه نویس انگولار" to="" flat />
                    </div>

                    <div>
                      <q-btn label="برنامه نویس اندروید" to="" flat />
                    </div>

                    <div>
                      <q-btn label="Database Admin" to="" flat />
                    </div>
                  </div>
                </div>

                <div class="full-width">
                  <q-btn to="" flat>
                    <span class="border-left"></span>
                    <span class="text-bold q-pl-md">تست نرم افزار</span>
                  </q-btn>
                </div>

                <div class="full-width">
                  <q-btn to="" flat>
                    <span class="border-left"></span>
                    <span class="text-bold q-pl-md"
                      >علوم داده / هوش مصنوعی</span
                    >
                  </q-btn>
                </div>
              </div>
            </q-tab-panel>

            <q-tab-panel class="full-width" name="provincesAndCities">
              <!-- Header -->

              <div class="full-width row justify-between q-py-md">
                <div class="col-6" @click="tab = 'jobs'">
                  <q-icon name="arrow_forward_ios" size="16px" />

                  <q-btn class="text-bold" flat label="فرصت های شغلی" />
                </div>

                <div class="col-6 flex justify-end">
                  <q-btn
                    flat
                    @click="drawer = !drawer"
                    class="btn--no-hover button-effect"
                    icon="close"
                  />
                </div>
              </div>

              <!-- Content -->

              <div class="full-width row">
                <div class="col-12 row justify-between">
                  <div class="col-12">
                    <q-btn flat class="btn--no-hover q-my-sm button-effect">
                      <span class="text-bold text-primary"
                        >همه فرصت های شغلی</span
                      >
                    </q-btn>
                  </div>
                </div>

                <div class="full-width">
                  <q-btn to="" flat>
                    <span class="border-left"></span>
                    <span class="text-bold q-pl-md">حسابدار/مالی و...</span>
                  </q-btn>

                  <div class="q-pl-md">
                    <div>
                      <q-btn label="مدیر مالی" to="" flat />
                    </div>

                    <div>
                      <q-btn label="رییس حسابداری" to="" flat />
                    </div>

                    <div>
                      <q-btn label="کمک حسابدار" to="" flat />
                    </div>

                    <div>
                      <q-btn label="حسابرس" to="" flat />
                    </div>
                  </div>
                </div>

                <div class="full-width">
                  <q-btn to="" flat>
                    <span class="border-left"></span>
                    <span class="text-bold q-pl-md"
                      >معامله گر و تحلیل گر بازار های مالی</span
                    >
                  </q-btn>
                </div>

                <div class="full-width">
                  <q-btn to="" flat>
                    <span class="border-left"></span>
                    <span class="text-bold q-pl-md"
                      >منشی و مسئول دفتر / امور اداری</span
                    >
                  </q-btn>
                </div>

                <div class="full-width">
                  <q-btn to="" flat>
                    <span class="border-left"></span>
                    <span class="text-bold q-pl-md">منابع انسانی</span>
                  </q-btn>
                </div>

                <div class="full-width">
                  <q-btn to="" flat>
                    <span class="border-left"></span>
                    <span class="text-bold q-pl-md"
                      >فروش و بازاریابی - کارشناس و مدیر</span
                    >
                  </q-btn>
                </div>

                <div class="full-width">
                  <q-btn to="" flat>
                    <span class="border-left"></span>
                    <span class="text-bold q-pl-md"
                      >فروشنده / بازاریاب / صندوقدار</span
                    >
                  </q-btn>
                </div>

                <div class="full-width">
                  <q-btn to="" flat>
                    <span class="border-left"></span>
                    <span class="text-bold q-pl-md"
                      >نماینده عملی (Med Rep)</span
                    >
                  </q-btn>
                </div>

                <div class="full-width">
                  <q-btn to="" flat>
                    <span class="border-left"></span>
                    <span class="text-bold q-pl-md"
                      >پشتیبانی و ارتباط با مشتریان</span
                    >
                  </q-btn>
                </div>

                <div class="full-width">
                  <q-btn to="" flat>
                    <span class="border-left"></span>
                    <span class="text-bold q-pl-md">روابط عمومی</span>
                  </q-btn>
                </div>

                <div class="full-width">
                  <q-btn to="" flat>
                    <span class="border-left"></span>
                    <span class="text-bold q-pl-md">دیجیتال مارکتینگ</span>
                  </q-btn>
                </div>

                <div class="full-width">
                  <q-btn to="" flat>
                    <span class="border-left"></span>
                    <span class="text-bold q-pl-md">سئو</span>
                  </q-btn>
                </div>

                <div class="full-width">
                  <q-btn to="" flat>
                    <span class="border-left"></span>
                    <span class="text-bold q-pl-md">تولید محتوا</span>
                  </q-btn>
                </div>

                <div class="full-width">
                  <q-btn to="" flat>
                    <span class="border-left"></span>
                    <span class="text-bold q-pl-md">ترجمه</span>
                  </q-btn>
                </div>

                <div class="full-width">
                  <q-btn to="" flat>
                    <span class="border-left"></span>
                    <span class="text-bold q-pl-md"
                      >برنامه نویسی و توسعه نرم افزار</span
                    >
                  </q-btn>

                  <div class="q-pl-md">
                    <div>
                      <q-btn label="برنامه نویس پایتون" to="" flat />
                    </div>

                    <div>
                      <q-btn label="برنامه نویس جاوا" to="" flat />
                    </div>

                    <div>
                      <q-btn label="برنامه نویس .Net" to="" flat />
                    </div>

                    <div>
                      <q-btn label="برنامه نویس php" to="" flat />
                    </div>

                    <div>
                      <q-btn label="برنامه نویس node.Js" to="" flat />
                    </div>

                    <div>
                      <q-btn label="برنامه نویس C++" to="" flat />
                    </div>

                    <div>
                      <q-btn label="برنامه نویس فرانت اند" to="" flat />
                    </div>

                    <div>
                      <q-btn label="برنامه نویس React" to="" flat />
                    </div>

                    <div>
                      <q-btn label="برنامه نویس انگولار" to="" flat />
                    </div>

                    <div>
                      <q-btn label="برنامه نویس اندروید" to="" flat />
                    </div>

                    <div>
                      <q-btn label="Database Admin" to="" flat />
                    </div>
                  </div>
                </div>

                <div class="full-width">
                  <q-btn to="" flat>
                    <span class="border-left"></span>
                    <span class="text-bold q-pl-md">تست نرم افزار</span>
                  </q-btn>
                </div>

                <div class="full-width">
                  <q-btn to="" flat>
                    <span class="border-left"></span>
                    <span class="text-bold q-pl-md"
                      >علوم داده / هوش مصنوعی</span
                    >
                  </q-btn>
                </div>
              </div>
            </q-tab-panel>

            <!-- End OF Change To Component -->

            <q-tab-panel class="full-width" name="cooperationType">
              <!-- Header -->

              <div class="full-width row justify-between q-py-md">
                <div class="col-6" @click="tab = 'jobs'">
                  <q-icon name="arrow_forward_ios" size="16px" />

                  <q-btn class="text-bold" flat label="فرصت های شغلی" />
                </div>

                <div class="col-6 flex justify-end">
                  <q-btn
                    flat
                    @click="drawer = !drawer"
                    class="btn--no-hover button-effect"
                    icon="close"
                  />
                </div>
              </div>

              <!-- Content -->

              <!-- Change To Component -->

              <div class="full-width row">
                <div class="col-12 row justify-between">
                  <div class="col-12">
                    <q-btn flat class="btn--no-hover q-my-sm button-effect">
                      <span class="text-bold text-primary"
                        >همه فرصت های شغلی</span
                      >
                    </q-btn>
                  </div>
                </div>

                <div class="full-width">
                  <q-btn to="" flat>
                    <span class="border-left"></span>
                    <span class="text-bold q-pl-md">حسابدار/مالی و...</span>
                  </q-btn>

                  <div class="q-pl-md">
                    <div>
                      <q-btn label="مدیر مالی" to="" flat />
                    </div>

                    <div>
                      <q-btn label="رییس حسابداری" to="" flat />
                    </div>

                    <div>
                      <q-btn label="کمک حسابدار" to="" flat />
                    </div>

                    <div>
                      <q-btn label="حسابرس" to="" flat />
                    </div>
                  </div>
                </div>

                <div class="full-width">
                  <q-btn to="" flat>
                    <span class="border-left"></span>
                    <span class="text-bold q-pl-md"
                      >معامله گر و تحلیل گر بازار های مالی</span
                    >
                  </q-btn>
                </div>

                <div class="full-width">
                  <q-btn to="" flat>
                    <span class="border-left"></span>
                    <span class="text-bold q-pl-md"
                      >منشی و مسئول دفتر / امور اداری</span
                    >
                  </q-btn>
                </div>

                <div class="full-width">
                  <q-btn to="" flat>
                    <span class="border-left"></span>
                    <span class="text-bold q-pl-md">منابع انسانی</span>
                  </q-btn>
                </div>

                <div class="full-width">
                  <q-btn to="" flat>
                    <span class="border-left"></span>
                    <span class="text-bold q-pl-md"
                      >فروش و بازاریابی - کارشناس و مدیر</span
                    >
                  </q-btn>
                </div>

                <div class="full-width">
                  <q-btn to="" flat>
                    <span class="border-left"></span>
                    <span class="text-bold q-pl-md"
                      >فروشنده / بازاریاب / صندوقدار</span
                    >
                  </q-btn>
                </div>

                <div class="full-width">
                  <q-btn to="" flat>
                    <span class="border-left"></span>
                    <span class="text-bold q-pl-md"
                      >نماینده عملی (Med Rep)</span
                    >
                  </q-btn>
                </div>

                <div class="full-width">
                  <q-btn to="" flat>
                    <span class="border-left"></span>
                    <span class="text-bold q-pl-md"
                      >پشتیبانی و ارتباط با مشتریان</span
                    >
                  </q-btn>
                </div>

                <div class="full-width">
                  <q-btn to="" flat>
                    <span class="border-left"></span>
                    <span class="text-bold q-pl-md">روابط عمومی</span>
                  </q-btn>
                </div>

                <div class="full-width">
                  <q-btn to="" flat>
                    <span class="border-left"></span>
                    <span class="text-bold q-pl-md">دیجیتال مارکتینگ</span>
                  </q-btn>
                </div>

                <div class="full-width">
                  <q-btn to="" flat>
                    <span class="border-left"></span>
                    <span class="text-bold q-pl-md">سئو</span>
                  </q-btn>
                </div>

                <div class="full-width">
                  <q-btn to="" flat>
                    <span class="border-left"></span>
                    <span class="text-bold q-pl-md">تولید محتوا</span>
                  </q-btn>
                </div>

                <div class="full-width">
                  <q-btn to="" flat>
                    <span class="border-left"></span>
                    <span class="text-bold q-pl-md">ترجمه</span>
                  </q-btn>
                </div>

                <div class="full-width">
                  <q-btn to="" flat>
                    <span class="border-left"></span>
                    <span class="text-bold q-pl-md"
                      >برنامه نویسی و توسعه نرم افزار</span
                    >
                  </q-btn>

                  <div class="q-pl-md">
                    <div>
                      <q-btn label="برنامه نویس پایتون" to="" flat />
                    </div>

                    <div>
                      <q-btn label="برنامه نویس جاوا" to="" flat />
                    </div>

                    <div>
                      <q-btn label="برنامه نویس .Net" to="" flat />
                    </div>

                    <div>
                      <q-btn label="برنامه نویس php" to="" flat />
                    </div>

                    <div>
                      <q-btn label="برنامه نویس node.Js" to="" flat />
                    </div>

                    <div>
                      <q-btn label="برنامه نویس C++" to="" flat />
                    </div>

                    <div>
                      <q-btn label="برنامه نویس فرانت اند" to="" flat />
                    </div>

                    <div>
                      <q-btn label="برنامه نویس React" to="" flat />
                    </div>

                    <div>
                      <q-btn label="برنامه نویس انگولار" to="" flat />
                    </div>

                    <div>
                      <q-btn label="برنامه نویس اندروید" to="" flat />
                    </div>

                    <div>
                      <q-btn label="Database Admin" to="" flat />
                    </div>
                  </div>
                </div>

                <div class="full-width">
                  <q-btn to="" flat>
                    <span class="border-left"></span>
                    <span class="text-bold q-pl-md">تست نرم افزار</span>
                  </q-btn>
                </div>

                <div class="full-width">
                  <q-btn to="" flat>
                    <span class="border-left"></span>
                    <span class="text-bold q-pl-md"
                      >علوم داده / هوش مصنوعی</span
                    >
                  </q-btn>
                </div>
              </div>
            </q-tab-panel>

            <q-tab-panel class="full-width" name="topCompanies">
              <!-- Header -->

              <div class="full-width row justify-between q-py-md">
                <div class="col-6" @click="tab = 'jobs'">
                  <q-icon name="arrow_forward_ios" size="16px" />

                  <q-btn class="text-bold" flat label="فرصت های شغلی" />
                </div>

                <div class="col-6 flex justify-end">
                  <q-btn
                    flat
                    @click="drawer = !drawer"
                    class="btn--no-hover button-effect"
                    icon="close"
                  />
                </div>
              </div>

              <!-- Content -->

              <div class="full-width row">
                <div class="col-12 row justify-between">
                  <div class="col-12">
                    <q-btn flat class="btn--no-hover q-my-sm button-effect">
                      <span class="text-bold text-primary">سازمان ها</span>
                    </q-btn>
                  </div>
                </div>

                <div class="full-width">
                  <q-btn to="" flat>
                    <span class="border-left"></span>
                    <span class="text-bold q-pl-md">حسابدار/مالی و...</span>
                  </q-btn>

                  <div class="q-pl-md">
                    <div>
                      <q-btn label="مدیر مالی" to="" flat />
                    </div>

                    <div>
                      <q-btn label="رییس حسابداری" to="" flat />
                    </div>

                    <div>
                      <q-btn label="کمک حسابدار" to="" flat />
                    </div>

                    <div>
                      <q-btn label="حسابرس" to="" flat />
                    </div>
                  </div>
                </div>

                <div class="full-width">
                  <q-btn to="" flat>
                    <span class="border-left"></span>
                    <span class="text-bold q-pl-md"
                      >معامله گر و تحلیل گر بازار های مالی</span
                    >
                  </q-btn>
                </div>

                <div class="full-width">
                  <q-btn to="" flat>
                    <span class="border-left"></span>
                    <span class="text-bold q-pl-md"
                      >منشی و مسئول دفتر / امور اداری</span
                    >
                  </q-btn>
                </div>

                <div class="full-width">
                  <q-btn to="" flat>
                    <span class="border-left"></span>
                    <span class="text-bold q-pl-md">منابع انسانی</span>
                  </q-btn>
                </div>

                <div class="full-width">
                  <q-btn to="" flat>
                    <span class="border-left"></span>
                    <span class="text-bold q-pl-md"
                      >فروش و بازاریابی - کارشناس و مدیر</span
                    >
                  </q-btn>
                </div>

                <div class="full-width">
                  <q-btn to="" flat>
                    <span class="border-left"></span>
                    <span class="text-bold q-pl-md"
                      >فروشنده / بازاریاب / صندوقدار</span
                    >
                  </q-btn>
                </div>

                <div class="full-width">
                  <q-btn to="" flat>
                    <span class="border-left"></span>
                    <span class="text-bold q-pl-md"
                      >نماینده عملی (Med Rep)</span
                    >
                  </q-btn>
                </div>

                <div class="full-width">
                  <q-btn to="" flat>
                    <span class="border-left"></span>
                    <span class="text-bold q-pl-md"
                      >پشتیبانی و ارتباط با مشتریان</span
                    >
                  </q-btn>
                </div>

                <div class="full-width">
                  <q-btn to="" flat>
                    <span class="border-left"></span>
                    <span class="text-bold q-pl-md">روابط عمومی</span>
                  </q-btn>
                </div>

                <div class="full-width">
                  <q-btn to="" flat>
                    <span class="border-left"></span>
                    <span class="text-bold q-pl-md">دیجیتال مارکتینگ</span>
                  </q-btn>
                </div>

                <div class="full-width">
                  <q-btn to="" flat>
                    <span class="border-left"></span>
                    <span class="text-bold q-pl-md">سئو</span>
                  </q-btn>
                </div>

                <div class="full-width">
                  <q-btn to="" flat>
                    <span class="border-left"></span>
                    <span class="text-bold q-pl-md">تولید محتوا</span>
                  </q-btn>
                </div>

                <div class="full-width">
                  <q-btn to="" flat>
                    <span class="border-left"></span>
                    <span class="text-bold q-pl-md">ترجمه</span>
                  </q-btn>
                </div>

                <div class="full-width">
                  <q-btn to="" flat>
                    <span class="border-left"></span>
                    <span class="text-bold q-pl-md"
                      >برنامه نویسی و توسعه نرم افزار</span
                    >
                  </q-btn>

                  <div class="q-pl-md">
                    <div>
                      <q-btn label="برنامه نویس پایتون" to="" flat />
                    </div>

                    <div>
                      <q-btn label="برنامه نویس جاوا" to="" flat />
                    </div>

                    <div>
                      <q-btn label="برنامه نویس .Net" to="" flat />
                    </div>

                    <div>
                      <q-btn label="برنامه نویس php" to="" flat />
                    </div>

                    <div>
                      <q-btn label="برنامه نویس node.Js" to="" flat />
                    </div>

                    <div>
                      <q-btn label="برنامه نویس C++" to="" flat />
                    </div>

                    <div>
                      <q-btn label="برنامه نویس فرانت اند" to="" flat />
                    </div>

                    <div>
                      <q-btn label="برنامه نویس React" to="" flat />
                    </div>

                    <div>
                      <q-btn label="برنامه نویس انگولار" to="" flat />
                    </div>

                    <div>
                      <q-btn label="برنامه نویس اندروید" to="" flat />
                    </div>

                    <div>
                      <q-btn label="Database Admin" to="" flat />
                    </div>
                  </div>
                </div>

                <div class="full-width">
                  <q-btn to="" flat>
                    <span class="border-left"></span>
                    <span class="text-bold q-pl-md">تست نرم افزار</span>
                  </q-btn>
                </div>

                <div class="full-width">
                  <q-btn to="" flat>
                    <span class="border-left"></span>
                    <span class="text-bold q-pl-md"
                      >علوم داده / هوش مصنوعی</span
                    >
                  </q-btn>
                </div>
              </div>

              <!-- End OF Change To Component -->
            </q-tab-panel>
          </q-tab-panels>
        </div>
      </div>
    </q-drawer>

    <!-- Page Container -->

    <q-page-container>
      <router-view />
    </q-page-container>

    <!-- Footer -->

    <q-footer class="bg-dark text-white row justify-center">
      <!-- 4k Screen Content -->

      <div class="col-8 row q-my-md gt-lg">
        <div class="text-h6 text-weight-bold col-12 q-mt-md">سوالات متداول</div>

        <!-- Question Box and Answers -->

        <div class="col-12 q-my-md">
          <FooterDropdown
            v-for="(question, index) in questions"
            :key="'question-' + index"
            :question="question.question"
            :answer="question.answer"
          />
        </div>

        <div class="full-width row justify-between">
          <!-- Right Side Content -->

          <div class="col-8 row justify-between">
            <div class="col-6 row justify-between">
              <div class="col-8 br-10">
                <div class="row">
                  <div class="text-bold col-12 q-mt-md">کارجویان</div>

                  <div class="full-width q-py-xs q-mt-md">
                    <q-btn flat label="رزومه ساز دو زبانه" />
                  </div>

                  <div class="full-width q-py-xs">
                    <q-btn flat label="جستجوی فرصت‌ها" />
                  </div>

                  <q-expansion-item
                    class="full-width q-py-xs"
                    label="آزمون‌های خود شناسی"
                  >
                    <div class="flex justify-end">
                      <q-btn class="full-width q-my-xs" flat label="MBTI" />

                      <q-btn class="full-width q-my-xs" flat label="Holland" />

                      <q-btn class="full-width q-my-xs" flat label="NEO" />

                      <q-btn
                        class="full-width q-my-xs"
                        flat
                        label="هوش های چندگانه"
                      />

                      <q-btn class="full-width q-my-xs" flat label="Bar-On" />
                    </div>
                  </q-expansion-item>

                  <div class="full-width q-py-xs">
                    <q-btn flat label="سوالات متداول" />
                  </div>

                  <div class="full-width q-py-xs">
                    <q-btn flat label="دوره‌های آموزشی" />
                  </div>

                  <div class="full-width q-py-xs">
                    <q-btn flat label="رده بندی شرکت ها" />
                  </div>

                  <div class="full-width q-py-xs">
                    <q-btn flat label="آشنایی با شرکت ها" />
                  </div>
                </div>
              </div>

              <div class="col-4 br-10">
                <div class="col-12 q-mt-md">
                  <div class="text-weight-bold">درباره جاب ویژن</div>
                </div>

                <q-list class="q-mt-md">
                  <q-item>
                    <q-btn flat label="درباره ما" />
                  </q-item>

                  <q-item class="q-my-xs">
                    <q-btn flat label="سوالات متداول" />
                  </q-item>

                  <q-item class="q-my-xs">
                    <q-btn flat label="تماس با ما" />
                  </q-item>

                  <q-item class="q-my-xs">
                    <q-btn flat label="قوانین و مقررات" />
                  </q-item>
                </q-list>
              </div>
            </div>

            <!-- lg- Content -->

            <div class="col-6 row justify-between lt-md">
              <div class="col-8 br-10">
                <div class="row">
                  <div class="text-bold col-12 q-mt-md">کارجویان</div>

                  <div class="full-width q-py-xs q-mt-md">
                    <q-btn flat label="رزومه ساز دو زبانه" />
                  </div>

                  <div class="full-width q-py-xs">
                    <q-btn flat label="جستجوی فرصت‌ها" />
                  </div>

                  <q-expansion-item
                    class="full-width q-py-xs"
                    label="آزمون‌های خود شناسی"
                  >
                    <div class="flex justify-end">
                      <q-btn class="full-width q-my-xs" flat label="MBTI" />

                      <q-btn class="full-width q-my-xs" flat label="Holland" />

                      <q-btn class="full-width q-my-xs" flat label="NEO" />

                      <q-btn
                        class="full-width q-my-xs"
                        flat
                        label="هوش های چندگانه"
                      />

                      <q-btn class="full-width q-my-xs" flat label="Bar-On" />
                    </div>
                  </q-expansion-item>

                  <div class="full-width q-py-xs">
                    <q-btn flat label="سوالات متداول" />
                  </div>

                  <div class="full-width q-py-xs">
                    <q-btn flat label="دوره‌های آموزشی" />
                  </div>

                  <div class="full-width q-py-xs">
                    <q-btn flat label="رده بندی شرکت ها" />
                  </div>

                  <div class="full-width q-py-xs">
                    <q-btn flat label="آشنایی با شرکت ها" />
                  </div>
                </div>
              </div>

              <div class="col-4 br-10">
                <div class="col-12 q-mt-md">
                  <div class="text-weight-bold">درباره جاب ویژن</div>
                </div>

                <q-list class="q-mt-md">
                  <q-item>
                    <q-btn flat label="درباره ما" />
                  </q-item>

                  <q-item class="q-my-xs">
                    <q-btn flat label="سوالات متداول" />
                  </q-item>

                  <q-item class="q-my-xs">
                    <q-btn flat label="تماس با ما" />
                  </q-item>

                  <q-item class="q-my-xs">
                    <q-btn flat label="قوانین و مقررات" />
                  </q-item>
                </q-list>
              </div>
            </div>
          </div>

          <!-- National Registration Address -->

          <div class="col-4 row justify-end content-center">
            <q-img style="width: 175px; height: 175px" src="assets/logo.png" />
          </div>
        </div>
      </div>

      <!-- Tablet, Laptop and Large Laptop Content -->

      <div class="col-12 row q-my-md gt-xs lt-xl q-px-md">
        <div class="text-h6 text-weight-bold col-12 q-mt-md">سوالات متداول</div>

        <!-- Question Box and Answers -->

        <div class="col-12 q-my-md">
          <FooterDropdown
            v-for="(question, index) in questions"
            :key="'question-' + index"
            :question="question.question"
            :answer="question.answer"
          />
        </div>

        <div class="full-width row justify-between">
          <!-- Right Side Content -->

          <div class="col-8 row justify-between">
            <div class="col-6 row justify-between">
              <div class="col-8 br-10">
                <div class="row">
                  <div class="text-bold col-12 q-mt-md">کارجویان</div>

                  <div class="full-width q-mt-md">
                    <q-btn flat label="رزومه ساز دو زبانه" />
                  </div>

                  <div class="full-width">
                    <q-btn flat label="جستجوی فرصت‌ها" />
                  </div>

                  <q-expansion-item
                    class="full-width"
                    label="آزمون‌های خود شناسی"
                  >
                    <div class="flex justify-end">
                      <q-btn class="full-width q-my-xs" flat label="MBTI" />

                      <q-btn class="full-width q-my-xs" flat label="Holland" />

                      <q-btn class="full-width q-my-xs" flat label="NEO" />

                      <q-btn
                        class="full-width q-my-xs"
                        flat
                        label="هوش های چندگانه"
                      />

                      <q-btn class="full-width q-my-xs" flat label="Bar-On" />
                    </div>
                  </q-expansion-item>

                  <div class="full-width">
                    <q-btn flat label="سوالات متداول" />
                  </div>

                  <div class="full-width">
                    <q-btn flat label="دوره‌های آموزشی" />
                  </div>

                  <div class="full-width">
                    <q-btn flat label="رده بندی شرکت ها" />
                  </div>

                  <div class="full-width">
                    <q-btn flat label="آشنایی با شرکت ها" />
                  </div>
                </div>
              </div>

              <div class="col-4 br-10">
                <div class="col-12 q-mt-md">
                  <div class="text-weight-bold">درباره جاب ویژن</div>
                </div>

                <q-list class="q-mt-md">
                  <q-item>
                    <q-btn flat label="درباره ما" />
                  </q-item>

                  <q-item>
                    <q-btn flat label="سوالات متداول" />
                  </q-item>

                  <q-item>
                    <q-btn flat label="تماس با ما" />
                  </q-item>

                  <q-item>
                    <q-btn flat label="قوانین و مقررات" />
                  </q-item>
                </q-list>
              </div>
            </div>
          </div>

          <!-- National Registration Address -->

          <div class="col-4 row justify-end content-center">
            <q-img style="width: 175px; height: 175px" src="assets/logo.png" />
          </div>
        </div>
      </div>

      <!-- Mobile Content -->

      <div class="col-12 row q-my-md lt-sm q-px-md">
        <div class="text-h6 text-weight-bold col-12 q-mt-md">سوالات متداول</div>

        <!-- Question Box and Answers -->

        <div class="col-12 q-my-md">
          <FooterDropdown
            v-for="(question, index) in questions"
            :key="'question-' + index"
            :question="question.question"
            :answer="question.answer"
          />
        </div>

        <div class="full-width row justify-between">
          <!-- Right Side Content -->

          <div class="full-width">
            <q-expansion-item
              v-model="expandedTwo"
              label="کارجویان"
              class="full-width"
            >
              <div class="full-width q-py-xs q-mt-md">
                <q-btn flat label="رزومه ساز دو زبانه" />
              </div>

              <div class="full-width q-py-xs">
                <q-btn flat label="جستجوی فرصت‌ها" />
              </div>

              <q-expansion-item
                class="full-width q-py-xs"
                label="آزمون‌های خود شناسی"
              >
                <div class="flex justify-end">
                  <q-btn class="full-width q-my-xs" flat label="MBTI" />

                  <q-btn class="full-width q-my-xs" flat label="Holland" />

                  <q-btn class="full-width q-my-xs" flat label="NEO" />

                  <q-btn
                    class="full-width q-my-xs"
                    flat
                    label="هوش های چندگانه"
                  />

                  <q-btn class="full-width q-my-xs" flat label="Bar-On" />
                </div>
              </q-expansion-item>

              <div class="full-width q-py-xs">
                <q-btn flat label="سوالات متداول" />
              </div>

              <div class="full-width q-py-xs">
                <q-btn flat label="دوره‌های آموزشی" />
              </div>

              <div class="full-width q-py-xs">
                <q-btn flat label="رده بندی شرکت ها" />
              </div>

              <div class="full-width q-py-xs">
                <q-btn flat label="آشنایی با شرکت ها" />
              </div>
            </q-expansion-item>
          </div>

          <div class="full-width">
            <q-expansion-item
              v-model="expandedThree"
              label="درباره جاب ویژن"
              class="full-width"
            >
              <q-list class="q-mt-md">
                <q-item>
                  <q-btn flat label="درباره ما" />
                </q-item>

                <q-item class="q-my-xs">
                  <q-btn flat label="سوالات متداول" />
                </q-item>

                <q-item class="q-my-xs">
                  <q-btn flat label="تماس با ما" />
                </q-item>

                <q-item class="q-my-xs">
                  <q-btn flat label="قوانین و مقررات" />
                </q-item>
              </q-list>
            </q-expansion-item>
          </div>

          <!-- National Registration Address -->

          <div class="col-12 row justify-center content-center">
            <q-img style="width: 175px; height: 175px" src="assets/logo.png" />
          </div>
        </div>
      </div>

      <q-separator class="q-my-md full-width" />
      <!-- 4k Screen Content -->

      <div class="col-8 row q-my-md gt-lg">
        <div class="col-5">
          <div style="line-height: 35px">
            جاب‌ویژن بعنوان اولین ارائه دهنده بسته جامع خدمات کاریابی و استخدام،
            تجربه برگزاری موفق ادوار مختلف نمایشگاه‌های کار شریف و ایران را در
            کارنامه کاری خود دارد. سیستم هوشمند انطباق، رزومه ساز دو زبانه،
            تست‌های خودشناسی، ارتقای توانمندی‌ها به کمک پیشنهاد دوره‌های آموزشی
            و همکاری با معتبرترین سازمان‌ها برای استخدام از ویژگی‌های متمایز
            جاب‌ویژن است.
          </div>
        </div>

        <q-space />

        <div class="col-5">
          <div>
            جاب‌ویژن محصولی دانش بنیان شناخته شده است.
            <br />
            <br />
            دارای مجوز رسمی کاریابی الکترونیکی از وزارت کار، تعاون و رفاه
            اجتماعی
          </div>
        </div>
        <div class="col-12 row justify-between">
          <div class="q-mt-lg q-mb-md col-5">
            <q-img
              src="assets/header-logo-white.svg"
              style="width: 75px; height: 35px"
            />
          </div>

          <div class="q-mt-lg q-mb-md col-5">
            <q-btn
              class="q-mx-xs"
              size="20px"
              flat
              href="https://twitter.com/JobVision_ir?s=09"
              icon="fa-brands fa-twitter"
            />

            <q-btn
              class="q-mx-xs"
              size="20px"
              flat
              href="https://www.telegram.me/jobvision"
              icon="fa-brands fa-telegram"
            />

            <q-btn
              class="q-mx-xs"
              size="20px"
              flat
              href="https://www.linkedin.com/company/13213221?trk=tyah&trkInfo=clickedVertical%3Acompany%2CclickedEntityId%3A13213221%2Cidx%3A2-4-5%2CtarId%3A1477291719870%2Ctas%3Ajob%20vision"
              icon="fa-brands fa-linkedin"
            />

            <q-btn
              class="q-mx-xs"
              size="20px"
              flat
              href="https://www.instagram.com/job_vision"
              icon="fa-brands fa-instagram"
            />
          </div>
        </div>
      </div>

      <!-- Tablet, Laptop and Large Laptop Content -->

      <div
        class="col-12 row justify-between q-my-md q-px-sm gt-xs lt-xl q-px-md"
      >
        <div class="col-5">
          <div style="line-height: 35px">
            جاب‌ویژن بعنوان اولین ارائه دهنده بسته جامع خدمات کاریابی و استخدام،
            تجربه برگزاری موفق ادوار مختلف نمایشگاه‌های کار شریف و ایران را در
            کارنامه کاری خود دارد. سیستم هوشمند انطباق، رزومه ساز دو زبانه،
            تست‌های خودشناسی، ارتقای توانمندی‌ها به کمک پیشنهاد دوره‌های آموزشی
            و همکاری با معتبرترین سازمان‌ها برای استخدام از ویژگی‌های متمایز
            جاب‌ویژن است.
          </div>
        </div>

        <div class="col-5">
          <div>
            جاب‌ویژن محصولی دانش بنیان شناخته شده است.
            <br />
            <br />
            دارای مجوز رسمی کاریابی الکترونیکی از وزارت کار، تعاون و رفاه
            اجتماعی
          </div>
        </div>

        <q-separator class="full-width q-my-md" />

        <div class="col-12 row justify-between">
          <div class="q-mt-lg q-mb-md col-5">
            <q-img
              src="assets/header-logo-white.svg"
              style="width: 75px; height: 35px"
            />
          </div>

          <div class="q-mt-lg q-mb-md col-5">
            <q-btn
              class="q-mx-xs"
              size="20px"
              flat
              href="https://twitter.com/JobVision_ir?s=09"
              icon="fa-brands fa-twitter"
            />

            <q-btn
              class="q-mx-xs"
              size="20px"
              flat
              href="https://www.telegram.me/jobvision"
              icon="fa-brands fa-telegram"
            />

            <q-btn
              class="q-mx-xs"
              size="20px"
              flat
              href="https://www.linkedin.com/company/13213221?trk=tyah&trkInfo=clickedVertical%3Acompany%2CclickedEntityId%3A13213221%2Cidx%3A2-4-5%2CtarId%3A1477291719870%2Ctas%3Ajob%20vision"
              icon="fa-brands fa-linkedin"
            />

            <q-btn
              class="q-mx-xs"
              size="20px"
              flat
              href="https://www.instagram.com/job_vision"
              icon="fa-brands fa-instagram"
            />
          </div>
        </div>
      </div>

      <!-- Mobile Content -->

      <div class="col-12 row q-my-md lt-sm q-px-md">
        <div class="col-12">
          <div style="line-height: 35px">
            جاب‌ویژن بعنوان اولین ارائه دهنده بسته جامع خدمات کاریابی و استخدام،
            تجربه برگزاری موفق ادوار مختلف نمایشگاه‌های کار شریف و ایران را در
            کارنامه کاری خود دارد. سیستم هوشمند انطباق، رزومه ساز دو زبانه،
            تست‌های خودشناسی، ارتقای توانمندی‌ها به کمک پیشنهاد دوره‌های آموزشی
            و همکاری با معتبرترین سازمان‌ها برای استخدام از ویژگی‌های متمایز
            جاب‌ویژن است.
          </div>
        </div>

        <div class="col-12 q-mt-xl">
          <div>
            جاب‌ویژن محصولی دانش بنیان شناخته شده است.
            <br />
            <br />
            دارای مجوز رسمی کاریابی الکترونیکی از وزارت کار، تعاون و رفاه
            اجتماعی
          </div>
        </div>

        <q-separator class="q-mt-xl full-width" />

        <div class="col-12 row justify-between">
          <div class="q-mt-lg q-mb-md">
            <q-img
              src="assets/header-logo-white.svg"
              style="width: 75px; height: 35px"
            />
          </div>

          <div class="q-mt-lg q-mb-md">
            <q-btn
              class="q-mx-xs"
              size="20px"
              flat
              href="https://twitter.com/JobVision_ir?s=09"
              icon="fa-brands fa-twitter"
            />

            <q-btn
              class="q-mx-xs"
              size="20px"
              flat
              href="https://www.telegram.me/jobvision"
              icon="fa-brands fa-telegram"
            />

            <q-btn
              class="q-mx-xs"
              size="20px"
              flat
              href="https://www.linkedin.com/company/13213221?trk=tyah&trkInfo=clickedVertical%3Acompany%2CclickedEntityId%3A13213221%2Cidx%3A2-4-5%2CtarId%3A1477291719870%2Ctas%3Ajob%20vision"
              icon="fa-brands fa-linkedin"
            />

            <q-btn
              class="q-mx-xs"
              size="20px"
              flat
              href="https://www.instagram.com/job_vision"
              icon="fa-brands fa-instagram"
            />
          </div>
        </div>
      </div>
    </q-footer>
  </q-layout>
</template>

<script>
import { defineComponent, ref } from "vue";

import FooterDropdown from "../components/FooterDropdown.vue";

export default defineComponent({
  name: "MainLayout",

  components: {
    FooterDropdown,
  },

  setup() {
    const user = ref();
    const drawer = ref();
    const user_name = ref();
    const tab = ref("default");
    const addName = ref(false);
    const expanded = ref(false);
    const expandedTwo = ref(false);
    const expandedThree = ref(false);
    const width = ref(window.innerWidth);

    // Questions Box Data

    const questions = ref([
      {
        question:
          "سایت استخدامی جاب ویژن، چه مزیتی نسبت به دیگر سایت‌های کاریابی و استخدامی دارد؟",
        answer:
          "وبسایت جاب ویژن با بیش از 40 هزار آگهی استخدام فعال و استفاده از هوش مصنوعی برای پیشنهاد مرتبط‌ترین آگهی‌ها به کارجویان، فرایند کاریابی را بسیار آسان‌تر کرده است.",
      },
      {
        question: "آیا ساخت و ارسال رزومه در جاب ویژن برای من هزینه‌ای دارد؟",
        answer:
          "خیر، کارجویان می‌توانند بدون پرداخت هیچ هزینه‌ای در سایت کاریابی جاب ویژن رزومه بسازند و برای آگهی‌های استخدام ارسال کنند.",
      },
      {
        question:
          "چگونه می‌توانم آگهی‌های استخدام مشاغل مرتبط با خودم را پیدا کنم؟",
        answer:
          "شما می‌توانید به راحتی با استفاده از نوار جستجوی بالای سایت و انتخاب فیلترهای مختلف، آگهی‌های استخدامی حوزه مرتبط با خودتان را پیدا کنید.",
      },
      {
        question: "چگونه می‌توانم از جدیدترین آگهی‌های استخدام مطلع شوم؟",
        answer:
          "شما می‌توانید با فعالسازی گزینه ایمیل اطلاع رسانی و عضویت در بات تلگرامی جاب ویژن، از جدیدترین آگهی‌های استخدام و کاریابی حوزه شغلی خود مطلع شوید.",
      },
      {
        question:
          "آیا آگهی‌های استخدام شهرستان‌ها نیز در سایت جاب ویژن منتشر می‌شوند؟",
        answer:
          "بله؛ تمامی شهرها و شهرستان‌های استان‌های مختلف ایران در سایت جاب ویژن وجود دارند و شما می‌توانید با استفاده از فیلتر «شهر» در نوار جستجوی بالای سایت، هرکدام از آن‌ها را انتخاب کنید.",
      },
      {
        question:
          "آیا محدودیتی در ارسال رزومه برای آگهی‌های استخدامی در سایت جاب ویژن وجود دارد؟",
        answer:
          "خیر؛ شما می‌توانید رزومه خودتان را به صورت کاملا رایگان برای تعداد نامحدودی از آگهی‌های استخدام ارسال کنید.",
      },
    ]);

    function fetchUserData() {
      api.get("/api/user").then((r) => {
        user.value = r.data;
      });
    }

    function changeName() {
      api
        .patch("/api/user/" + user.value.id + "/update", {
          name: user_name.value,
        })
        .then(() => {
          fetchUserData();
        });
    }

    function toggleDialog() {
      if (addName.value == false) {
        addName.value = true;
      } else {
        addName.value = false;
      }
    }

    function logout() {
      api.post("/api/logout").then(() => {
        location.reload();
      });
    }

    return {
      tab,
      user,
      width,
      logout,
      drawer,
      addName,
      expanded,
      questions,
      user_name,
      changeName,
      expandedTwo,
      toggleDialog,
      expandedThree,
    };
  },
});
</script>

<style scoped>
.q-item {
  padding: 0 !important;
  min-height: 40px !important;
}

.fixed,
.fixed-full,
.fullscreen,
.fixed-center,
.fixed-bottom,
.fixed-left,
.fixed-right,
.fixed-top,
.fixed-top-left,
.fixed-top-right,
.fixed-bottom-left,
.fixed-bottom-right {
  position: absolute;
}

.q-tab-panel {
  padding: 0;
}

.q-layout__section--marginal {
  background-color: white;
  color: black;
}

.q-btn {
  padding: 0px 8px;
}

.q-item__section--main ~ .q-item__section--side {
  padding-right: 12px;
}

.q-item__section--avatar {
  min-width: 35px;
}

.q-item {
  padding: 12px 12px;
}

.shadow {
  box-shadow: 0 1px 30px #00000008, 0 1px 2px #0000000d;
  border-radius: 0 0 10px 10px;
  background-color: #fff;
}

:deep(.q-btn.btn--no-hover .q-focus-helper) {
  display: none;
}

.button-effect:hover {
  border-color: #5660f2 !important;
  border-bottom-style: solid !important;
  border-width: 3px !important;
}

.background {
  background-color: #ffffff1a !important;
}

.border-18 {
  border-radius: 18.5px;
}

.border-18-bottom {
  border-bottom-left-radius: 18.5px;
  border-bottom-right-radius: 18.5px;
}

.br-10 {
  border-radius: 10px;
}

.border-left {
  height: 12px;
  border-left: 2px solid #5660f2;
}
</style>
