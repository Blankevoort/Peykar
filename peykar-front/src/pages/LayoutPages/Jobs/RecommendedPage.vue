<template>
  <q-page style="background-color: #f8f9fa">
    <div class="row justify-center">
      <!-- Inputs -->

      <div
        style="background-color: white"
        class="full-width row justify-center"
      >
        <div
          class="col-xs-12 col-sm-12 col-md-12 col-lg-8 col-xl-8 q-px-lg q-my-md"
        >
          <div
            class="lt-md full-width q-py-xs"
            style="border: 1px solid #ebebeb; border-radius: 5px"
          >
            <q-btn flat>
              <q-icon name="search" size="24px" />
              <span class="text-grey-6">جستجو در آگهی های جدید</span>
            </q-btn>
          </div>

          <!-- Larger Screen Inputs -->

          <div class="gt-sm row justify-center">
            <div class="col-7 row">
              <q-select
                class="col-8"
                outlined
                v-model="model"
                :options="options"
                label="عنوان شغلی یا شرکت"
                use-input
                hide-selected
                fill-input
                hide-dropdown-icon
              >
                <template v-slot:prepend>
                  <q-icon name="search" />
                </template>
              </q-select>

              <q-select
                class="col-4"
                outlined
                v-model="model"
                :options="options"
                label="گروه شغلی"
              >
                <template v-slot:prepend>
                  <q-icon name="work" />
                </template>
              </q-select>
            </div>

            <q-select
              class="col-3 q-px-sm"
              outlined
              v-model="model"
              :options="options"
              label="شهر"
              use-input
              hide-selected
              fill-input
            >
              <template v-slot:prepend>
                <q-icon name="location_on" />
              </template>
            </q-select>

            <div class="col-2">
              <q-btn
                color="primary"
                label="جستجو در مشاغل"
                to="/jobs"
                class="text-weight-bold full-height"
              />
            </div>
          </div>
        </div>
      </div>

      <!-- tabs -->

      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8 col-xl-8 row q-my-md">
        <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 col-xl-2 q-pl-lg">
          <q-card class="gt-sm" bordered>
            <q-tabs
              inline-label
              vertical
              indicator-color="transparent"
              active-class="active-tab"
              v-model="tab"
            >
              <q-tab
                icon="upload_file"
                class="text-black"
                style="background: white; border-radius: 8px"
                name="CVSent"
                label="رزومه های ارسال شده"
              />

              <q-tab
                icon="star_outline"
                class="text-black"
                style="background: white; border-radius: 8px"
                name="suggestion"
                label="مشاغل پیشنهادی"
              />

              <q-tab
                icon="favorite_outline"
                class="text-black"
                style="background: white; border-radius: 8px"
                name="savedOffers"
                label="مشاغل نشان شده"
              />

              <q-tab
                icon="apartment"
                class="text-black"
                style="background: white; border-radius: 8px"
                name="followingCompanies"
                label="شرکت های دنبال شده"
              />
            </q-tabs>
          </q-card>

          <q-card class="lt-md q-mb-md q-mr-lg">
            <q-tabs
              class="full-width"
              inline-label
              indicator-color="transparent"
              active-class="active-tab-small"
              v-model="tab"
            >
              <q-tab
                icon="upload_file"
                class="text-black"
                style="background: white; border-radius: 8px"
                name="CVSent"
                label="رزومه های ارسال شده"
              />

              <q-tab
                icon="star_outline"
                class="text-black"
                style="background: white; border-radius: 8px"
                name="suggestion"
                label="مشاغل پیشنهادی"
              />

              <q-tab
                icon="favorite_outline"
                class="text-black"
                style="background: white; border-radius: 8px"
                name="savedOffers"
                label="مشاغل نشان شده"
              />

              <q-tab
                icon="apartment"
                class="text-black"
                style="background: white; border-radius: 8px"
                name="followingCompanies"
                label="شرکت های دنبال شده"
              />
            </q-tabs>
          </q-card>
        </div>

        <!-- tabs Content -->

        <q-tab-panels
          class="col-xs-12 col-sm-12 col-md-9 col-lg-9 col-xl-10"
          v-model="tab"
          animated
          swipeable
          vertical
          transition-prev="jump-up"
          transition-next="jump-up"
        >
          <q-tab-panel class="row" name="CVSent">
            <!-- Sorting -->

            <div class="col-xs-12 col-sm-12 col-md-7 col-lg-7 col-xl-8 q-px-md">
              <div
                class="col-xs-12 col-sm-12 col-md-3 col-lg-3 col-xl-2 q-pl-lg"
              >
                <q-tabs
                  active-class="active-category"
                  indicator-color="transparent"
                  v-model="categories"
                >
                  <q-tab
                    class="q-mx-xs q-my-xs text-black not-active-category"
                    style="border-radius: 40px"
                    name="all"
                    label="همه(1)"
                  />

                  <q-tab
                    class="q-mx-xs q-my-xs text-black not-active-category"
                    style="border-radius: 40px"
                    name="sent"
                    label="دریافت شده توسط کارفرما(1)"
                  />

                  <q-tab
                    class="q-mx-xs q-my-xs text-black not-active-category"
                    style="border-radius: 40px"
                    name="priority"
                    label="در اولویت بررسی(0)"
                  />

                  <q-tab
                    class="q-mx-xs q-my-xs text-black not-active-category"
                    style="border-radius: 40px"
                    name="confirms"
                    label="تایید شده(0)"
                  />

                  <q-tab
                    class="q-mx-xs q-my-xs text-black not-active-category"
                    style="border-radius: 40px"
                    name="rejects"
                    label="رد شده(0)"
                  />

                  <q-tab
                    class="q-mx-xs q-my-xs text-black not-active-category"
                    style="border-radius: 40px"
                    name="canceled"
                    label="انصراف داده شده(0)"
                  />

                  <q-tab
                    class="q-mx-xs q-my-xs text-black not-active-category"
                    style="border-radius: 40px"
                    name="closed"
                    label="آگهی های بسته شده(0)"
                  />
                </q-tabs>
              </div>

              <q-tab-panels v-model="categories">
                <q-tab-panel name="all">
                  <div class="full-width q-my-md">
                    <div style="background-color: white">
                      <div class="q-px-md text-right">
                        <q-btn-dropdown
                          class="q-my-sm"
                          label="تاریخ درخواست"
                          dropdown-icon="arrow_drop_down"
                          icon="sort"
                          flat
                        >
                          <q-tabs
                            vertical
                            active-class="active-sort-type"
                            indicator-color="transparent"
                            v-model="tab"
                            class="row"
                          >
                            <q-tab
                              class="q-mx-xs q-my-xs text-black"
                              style="border-radius: 8px"
                              name="all"
                              label="تاریخ درخواست"
                            />

                            <q-tab
                              class="q-mx-xs q-my-xs text-black"
                              style="border-radius: 8px"
                              name="seen"
                              label="تاریخ تایین وضعیت"
                            />
                          </q-tabs>
                        </q-btn-dropdown>
                      </div>
                    </div>
                  </div>

                  <q-list class="col-12 q-my-sm">
                    <q-expansion-item
                      expand-icon-class="q-pb-lg"
                      class="bg-white br-10 q-pa-sm"
                      expand-icon-toggle
                      expand-separator
                    >
                      <template v-slot:header>
                        <q-item-section class="q-pb-sm text-bold">
                          <span style="font-size: 14px">برنامه نویس</span>

                          <div class="text-caption text-grey-7 q-mt-xs">
                            ارسال شده برای
                            <span class="text-bold">داده نگار</span> امروز
                          </div>

                          <div class="text-bold text-grey-8">
                            تعیین وضعیت نشده
                          </div>
                        </q-item-section>
                      </template>

                      <q-separator style="height: 2px" />

                      <div style="padding: 8px 0 16px 0">
                        <q-btn
                          flat
                          class="text-red"
                          label="انصراف از درخواست"
                          icon="delete"
                        />
                      </div>
                    </q-expansion-item>
                  </q-list>

                  <div class="q-my-md row justify-end">
                    <q-tabs active-class="active-tabs" v-model="CVPage">
                      <q-tab
                        class="q-mx-xs text-black"
                        style="
                          background: white;
                          border-radius: 8px;
                          width: 40px;
                        "
                        name="pageOne"
                        label="1"
                      />
                    </q-tabs>
                  </div>
                </q-tab-panel>

                <q-tab-panel name="sent">
                  <div
                    v-for="(job, index) in jobs"
                    :key="'job-' + index + 1"
                    class="q-px-sm q-my-md col-lg-6 col-xl-4"
                  >
                    <q-card flat bordered>
                      <!-- Job`s Tags -->

                      <div class="row justify-between" v-if="job.tagList">
                        <div class="row col-12">
                          <div class="col-10">
                            <q-badge
                              v-for="(tag, index) in job.tagList"
                              :key="index"
                              class="q-my-xs q-mx-xs q-py-sm"
                              :color="tag.important ? 'red-2' : 'indigo-1'"
                              :text-color="
                                tag.important ? 'negative' : 'primary'
                              "
                              :label="tag.label"
                            />
                          </div>

                          <div class="col-2 text-right">
                            <q-btn flat icon="favorite_outline" />
                          </div>
                        </div>
                      </div>

                      <q-card-section horizontal>
                        <q-card-section
                          class="col-xs-5 col-sm-3 flex flex-center"
                        >
                          <q-img
                            class="rounded-borders"
                            :src="job.image"
                            style="width: 48px; height: 48px"
                          />
                        </q-card-section>

                        <q-card-section>
                          <div class="q-mt-sm q-mb-xs">{{ job.title }}</div>

                          <div class="text-caption" v-if="job.company">
                            {{ job.company }}
                          </div>

                          <div class="text-caption text-grey row">
                            <div>
                              {{ job.location }}
                            </div>

                            <div class="row" v-if="job.rightsMin">
                              <span class="q-px-sm">|</span>

                              <p class="text-positive" v-if="job.rightsMax">
                                {{ job.rightsMin }} - {{ job.rightsMax }}
                              </p>
                              <p class="text-positive" v-else>
                                {{ job.rightsMin }}+
                              </p>
                            </div>
                          </div>
                        </q-card-section>
                      </q-card-section>

                      <q-separator inset />

                      <q-card-actions class="q-px-sm">
                        <q-btn flat>
                          {{ timeSincePosted(job.postedDate) }}</q-btn
                        >

                        <q-space />

                        <q-btn color="positive" label="ارسال رزومه" />
                      </q-card-actions>
                    </q-card>
                  </div>

                  <div class="q-my-md row justify-end">
                    <q-tabs active-class="active-tabs" v-model="CVPage">
                      <q-tab
                        class="q-mx-xs text-black"
                        style="
                          background: white;
                          border-radius: 8px;
                          width: 40px;
                        "
                        name="pageOne"
                        label="1"
                      />
                    </q-tabs>
                  </div>
                </q-tab-panel>

                <q-tab-panel name="priority">
                  <div
                    class="col-12 row justify-between content-center"
                    style="margin-top: 250px"
                  >
                    <div class="col-12 q-my-xs row justify-center">
                      <q-img
                        class="col-6 content-center"
                        src="https://jobvision.ir/assets/images/my-applications/applications-empty-state.svg"
                      />

                      <div class="text-grey-6 q-mt-xl">
                        درخواست‌هایی که توسط کارفرما به مرحله «در اولویت بررسی»
                        منتقل شوند، در این بخش نمایش داده می‌شوند.
                      </div>
                    </div>
                  </div>
                </q-tab-panel>

                <q-tab-panel name="confirms">
                  <div
                    class="col-12 row justify-between content-center"
                    style="margin-top: 250px"
                  >
                    <div class="col-12 q-my-xs row justify-center">
                      <q-img
                        class="col-6 content-center"
                        src="https://jobvision.ir/assets/images/my-applications/applications-empty-state.svg"
                      />

                      <div class="text-grey-6 q-mt-xl">
                        درخواست‌هایی که توسط کارفرما به مرحله «تایید شده» منتقل
                        شوند، در این بخش نمایش داده می‌شوند.
                      </div>
                    </div>
                  </div>
                </q-tab-panel>

                <q-tab-panel name="rejects">
                  <div
                    class="col-12 row justify-between content-center"
                    style="margin-top: 250px"
                  >
                    <div class="col-12 q-my-xs row justify-center">
                      <q-img
                        class="col-6 content-center"
                        src="https://jobvision.ir/assets/images/my-applications/applications-empty-state.svg"
                      />

                      <div class="text-grey-6 q-mt-xl">
                        درخواست‌هایی که توسط کارفرما رد شوند، در این بخش نمایش
                        داده می‌شوند.
                      </div>
                    </div>
                  </div>
                </q-tab-panel>

                <q-tab-panel name="canceled">
                  <div
                    class="col-12 row justify-between content-center"
                    style="margin-top: 250px"
                  >
                    <div class="col-12 q-my-xs row justify-center">
                      <q-img
                        class="col-6 content-center"
                        src="https://jobvision.ir/assets/images/my-applications/applications-empty-state.svg"
                      />

                      <div class="text-grey-6 q-mt-xl">
                        درخواست هایی که از ادامه فرایند استخدام انصراف داده اید
                        در این قسمت نمایش داده می شوند.
                      </div>
                    </div>
                  </div>
                </q-tab-panel>

                <q-tab-panel name="closed">
                  <div
                    class="col-12 row justify-between content-center"
                    style="margin-top: 250px"
                  >
                    <div class="col-12 q-my-xs row justify-center">
                      <q-img
                        class="col-6 content-center"
                        src="https://jobvision.ir/assets/images/my-applications/applications-empty-state.svg"
                      />

                      <div class="text-grey-6 q-mt-xl">
                        درخواست‌هایی که آگهی مربوط به آن‌ها بسته شده باشد، در
                        این بخش نمایش داده می‌شوند.
                      </div>
                    </div>
                  </div>
                </q-tab-panel>
              </q-tab-panels>
            </div>

            <!-- LeftSide Content -->

            <div
              class="col-md-5 col-lg-5 col-xl-4 row justify-center gt-sm q-pr-xl"
            >
              <questions />
            </div>
          </q-tab-panel>

          <q-tab-panel class="row" name="suggestion">
            <!-- jobs Count and Sorting -->

            <div class="col-xs-12 col-sm-12 col-md-7 col-lg-7 col-xl-8 q-px-lg">
              <div class="full-width bg-white">
                <div class="row justify-between">
                  <div class="col-6 q-px-md q-my-md text-grey-7">
                    40 فرصت شغلی
                  </div>

                  <div class="col-6 q-px-md text-right">
                    <q-btn-dropdown
                      class="q-my-sm"
                      label="منطبق ترین"
                      dropdown-icon="arrow_drop_down"
                      icon="sort"
                      flat
                    >
                      <q-tabs
                        vertical
                        active-class="active-sort-type"
                        indicator-color="transparent"
                        v-model="tab"
                      >
                        <q-tab
                          class="q-mx-xs q-my-xs text-black"
                          style="border-radius: 8px"
                          name="recent"
                          label="جدیدترین"
                        />

                        <q-tab
                          class="q-mx-xs q-my-xs text-black"
                          style="border-radius: 8px"
                          name="suitable"
                          label="منطبق ترین"
                        />

                        <q-tab
                          class="q-mx-xs q-my-xs text-black"
                          style="border-radius: 8px"
                          name="mostSalary"
                          label="بیشترین حقوق"
                        />
                      </q-tabs>
                    </q-btn-dropdown>
                  </div>
                </div>
              </div>

              <!-- jobs List -->

              <div
                class="q-my-md col-12"
                v-for="(job, index) in jobs"
                :key="'job-' + index + 1"
              >
                <q-card flat bordered>
                  <!-- Job`s Tags -->

                  <div class="row justify-between" v-if="job.tagList">
                    <div class="row col-12">
                      <div class="col-10">
                        <q-badge
                          v-for="(tag, index) in job.tagList"
                          :key="index"
                          class="q-my-xs q-mx-xs q-py-sm"
                          :color="tag.important ? 'red-2' : 'indigo-1'"
                          :text-color="tag.important ? 'negative' : 'primary'"
                          :label="tag.label"
                        />
                      </div>

                      <div class="col-2 text-right">
                        <q-btn flat icon="favorite_outline" />
                      </div>
                    </div>
                  </div>

                  <q-card-section horizontal>
                    <q-card-section class="col-xs-5 col-sm-2 flex flex-center">
                      <q-img
                        class="rounded-borders"
                        style="width: 48px; height: 48px"
                        :src="job.image"
                      />
                    </q-card-section>

                    <q-card-section>
                      <div class="q-mt-sm q-mb-xs">{{ job.title }}</div>

                      <div class="text-caption" v-if="job.company">
                        {{ job.company }}
                      </div>

                      <div class="text-caption text-grey row">
                        <div>
                          {{ job.location }}
                        </div>

                        <div class="row" v-if="job.rightsMin">
                          <span class="q-px-sm">|</span>

                          <p class="text-positive" v-if="job.rightsMax">
                            {{ job.rightsMin }} - {{ job.rightsMax }}
                          </p>
                          <p class="text-positive" v-else>
                            {{ job.rightsMin }}+
                          </p>
                        </div>
                      </div>
                    </q-card-section>
                  </q-card-section>

                  <q-separator inset />

                  <q-card-actions class="q-px-sm">
                    <q-btn flat> {{ timeSincePosted(job.postedDate) }}</q-btn>

                    <q-space />

                    <q-btn color="positive" label="ارسال رزومه" />
                  </q-card-actions>
                </q-card>
              </div>
            </div>

            <!-- LeftSide Content -->

            <div
              class="col-md-5 col-lg-5 col-xl-4 row justify-center gt-sm q-pr-xl"
            >
              <q-card class="shadow-2">
                <q-card-section>
                  <div class="q-pa-md">
                    <q-icon name="work" />
                    تنظیمات فرصت‌های شغلی پیشنهادی
                  </div>
                </q-card-section>

                <q-separator />

                <div class="row">
                  <div class="q-mb-md q-mt-sm col-12">
                    <div class="text-caption text-grey-6 q-mx-sm">
                      استان های مورد علاقه
                    </div>
                    <div class="q-mt-sm q-mx-sm">همه استان‌ها</div>
                  </div>

                  <div class="q-mb-md q-mt-sm col-12">
                    <div class="text-caption text-grey-6 q-mx-sm">
                      حوزه‌های شغلی مورد علاقه
                    </div>
                    <div class="q-mt-sm q-mx-sm">
                      توسعه نرم افزار و برنامه نویسی
                    </div>
                  </div>

                  <div class="q-mb-md q-mt-sm col-12">
                    <div class="text-caption text-grey-6 q-mx-sm">
                      نوع همکاری مورد نظر
                    </div>
                    <div class="q-mt-sm q-mx-sm">
                      تمام وقت، پاره وقت، قراردادی / پروژه ای
                    </div>
                  </div>

                  <div class="q-my-sm col-12">
                    <q-separator class="q-mb-sm" />

                    <div class="text-caption text-grey-6 q-mx-sm">
                      تمایل به دورکاری
                    </div>

                    <div class="q-mt-sm q-mx-sm">دورکاری، حضوری</div>
                  </div>

                  <div class="q-mb-md q-mt-xs col-12 text-center">
                    <q-separator class="q-mb-md" />

                    <q-btn
                      style="font-size: 17px"
                      flat
                      color="primary"
                      label="ویرایش"
                      icon="edit"
                    />
                  </div>
                </div>
              </q-card>

              <div
                class="row justify-between shadow-2 q-my-md q-pa-md"
                style="background: white; border-radius: 4px"
              >
                <div class="col-8">
                  دریافت ایمیل و پیامک فرصت های شغلی پیشنهادی
                </div>
                <q-toggle
                  class="col-4 justify-end"
                  v-model="getMessage"
                  color="green"
                />
              </div>
            </div>
          </q-tab-panel>

          <q-tab-panel class="row" name="savedOffers">
            <!-- Sorting -->

            <div class="col-xs-12 col-sm-12 col-md-7 col-lg-7 col-xl-8 q-px-md">
              <div
                class="col-12 row justify-between content-center items-center"
              >
                <div class="col-12 q-my-xs row justify-center text-center">
                  <div class="col-7">
                    <q-img
                      style="width: 160px; height: 80px"
                      src="https://jobvision.ir/assets/images/save-job/empty-state.svg"
                    />

                    <div class="text-grey-14 q-mt-md" style="font-size: 16px">
                      مشاغلی که ذخیره می‌کنید در این بخش نشان داده می شوند.
                    </div>

                    <div class="text-grey-6 q-mt-md">
                      برای ذخیره مشاغل، روی نشان قلب در بالای هر آگهی کلیک کنید.
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- LeftSide Content -->

            <div
              class="col-md-5 col-lg-5 col-xl-4 row justify-center gt-sm q-pr-xl"
              style="border-radius: 8px; overflow: hidden"
            >
              <div class="col-12 row justify-center q-pa-xs">
                <q-img
                  src="https://jobvision.ir/assets/images/save-job/uni.svg"
                />

                <div
                  class="text-grey-14 text-bold q-mt-xl q-mb-md"
                  style="font-size: 16px"
                >
                  با شرکت در بهترین دوره های آموزشی ، شانس استخدام خود را افزایش
                  دهید.
                </div>
              </div>
            </div>
          </q-tab-panel>

          <q-tab-panel class="row" name="followingCompanies">
            <!-- Sorting -->

            <div class="col-xs-12 col-sm-12 col-md-7 col-lg-7 col-xl-8 q-px-md">
              <div
                class="col-12 row justify-between content-center items-center"
              >
                <div class="col-12 q-my-xs row justify-center text-center">
                  <div class="col-7">
                    <q-img
                      style="width: 160px; height: 80px"
                      src="https://jobvision.ir/assets/images/followed-companies/empty-state.svg"
                    />

                    <div class="text-grey-14 q-mt-md" style="font-size: 16px">
                      هنوز شرکتی را دنبال نکردید.
                    </div>

                    <div class="text-grey-6 q-mt-md">
                      می توانید از صفحه شرکت ها، شرکت مورد نظرتان را دنبال کنید.
                    </div>

                    <div class="q-mt-lg">
                      <q-btn
                        outline
                        color="primary"
                        label="لیست شرکت ها"
                        to="companies"
                      />
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- LeftSide Content -->

            <div
              class="col-md-5 col-lg-5 col-xl-4 row justify-center gt-sm q-pr-xl"
              style="background: white; border-radius: 4px; height: 125px"
            >
              <div
                class="q-py-sm q-pl-md"
                style="font-size: 19px; font-weight: bolder"
              >
                اطلاع‌رسانی شغلی
              </div>

              <q-separator class="full-width" />

              <div class="col-9 q-pa-md">
                فرصت‌های شغلی شرکت‌های دنبال شده به من ایمیل شود.
              </div>

              <q-toggle
                class="col-3 q-pa-md justify-end"
                v-model="getMessage"
                color="green"
              />
            </div>
          </q-tab-panel>
        </q-tab-panels>
      </div>
    </div>
  </q-page>
</template>

<script>
import { ref } from "vue";

import questions from "../../../components/CVSentSideBar.vue";
import { getJobs } from "../../../composables/getJobs";

export default {
  components: { questions },
  setup() {
    const jobs = getJobs();
    const getMessage = ref(true);
    const tab = ref("suggestion");
    const CVPage = ref("pageOne");
    const categories = ref("all");
    const timeSincePosted = (postedDate) => {
      const now = new Date();
      const posted = new Date(postedDate);
      const diffInMilliseconds = now - posted;
      const diffInHours = Math.floor(diffInMilliseconds / (1000 * 60 * 60));
      const diffInDays = Math.floor(diffInHours / 24);

      if (diffInDays > 0) {
        return `${diffInDays} روز پیش`;
      } else {
        return `${diffInHours} ساعت پیش`;
      }
    };

    return {
      tab,
      jobs,
      CVPage,
      getMessage,
      categories,
      timeSincePosted,
      options: ["Google", "Facebook", "Twitter", "Apple", "Oracle"],
      model: ref(null),
    };
  },
};
</script>

<style scoped>
.q-tab__label {
  font-size: 12px;
  line-height: 1.715em;
  font-weight: 500;
}

.q-item {
  padding: 0;
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

.active-tabs {
  background-color: #5660f2 !important;
  color: white !important;
}

.active-tab-small {
  border-bottom: 3px solid;
  border-color: #5660f2 !important;
  border-bottom-right-radius: 0px !important;
  border-bottom-left-radius: 0px !important;
}

.active-tab {
  border-left: 3px solid;
  border-color: #5660f2 !important;
  border-top-left-radius: 0px !important;
  border-bottom-left-radius: 0px !important;
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

.br-10 {
  border-radius: 10px !important;
}
</style>
