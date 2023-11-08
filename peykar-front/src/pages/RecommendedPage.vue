<template>
  <q-page style="background-color: #f8f9fa">
    <div class="row justify-center">
      <!-- Inputs -->

      <div style="background-color: white" class="col-12 row justify-center">
        <div class="col-8 row justify-center q-my-md">
          <q-select
            class="col-4 q-pl-lg"
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
            class="col-3"
            outlined
            v-model="model"
            :options="options"
            label="گروه شغلی"
          >
            <template v-slot:prepend>
              <q-icon name="work" />
            </template>
          </q-select>

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

          <q-btn
            color="primary"
            label="جستجو در مشاغل"
            to="/jobs"
            class="col-2 q-px-sm text-weight-bold"
          />
        </div>
      </div>

      <!-- tabs -->

      <div class="col-8 row q-my-md q-pl-lg">
        <div class="col-2 q-px-sm">
          <q-card class="row" bordered>
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
        </div>

        <!-- tabs Content -->

        <q-tab-panels
          class="col-10"
          v-model="tab"
          animated
          swipeable
          vertical
          transition-prev="jump-up"
          transition-next="jump-up"
        >
          <q-tab-panel class="row" name="CVSent">
            <!-- Sorting -->

            <div class="col-9">
              <div class="full-width row justify-start">
                <q-tabs
                  active-class="active-category"
                  indicator-color="transparent"
                  v-model="categories"
                >
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
                    <q-item-section class="q-pb-sm" avatar>
                      <q-img src="../assets/logo.png" />
                    </q-item-section>

                    <q-item-section class="q-pb-sm text-bold">
                      برنامه‌نویس (Front-End (Vuejs
                      <br />
                      <div class="text-caption text-grey-7">
                        ارسال شده برای
                        <span class="text-bold">داده نگار</span> امروز
                      </div>
                    </q-item-section>

                    <q-item-section class="q-pb-sm" side>
                      <div
                        class="row items-center text-bold q-pb-md"
                        style="font-size: 13px"
                      >
                        تعیین وضعیت نشده
                      </div>
                    </q-item-section>
                  </template>

                  <q-card>
                    <q-separator style="height: 2px" />

                    <q-card-section style="padding: 8px 0 16px 0">
                      <q-btn
                        flat
                        class="text-red"
                        label="انصراف از درخواست"
                        icon="delete"
                      />
                    </q-card-section>
                  </q-card>
                </q-expansion-item>
              </q-list>

              <div class="q-my-md row justify-end">
                <q-tabs active-class="active-tabs" v-model="CVPage">
                  <q-tab
                    class="q-mx-xs text-black"
                    style="background: white; border-radius: 8px; width: 40px"
                    name="pageOne"
                    label="1"
                  />
                </q-tabs>
              </div>

              <!-- <div
                class="col-12 row justify-between content-center"
                style="margin-top: -650px"
              >
                <div class="col-12 q-my-xs row justify-center">
                  <q-img
                    class="col-6 content-center"
                    src="https://jobvision.ir/assets/images/my-applications/applications-empty-state.svg"
                  />

                  <div class="text-grey-6 q-mt-xl">
                    درخواست هایی که ارسال کرده اید در این قسمت نمایش داده می
                    شوند.
                  </div>
                </div>
              </div> -->
            </div>

            <!-- LeftSide Content -->

            <div class="col-3 justify-center q-pl-sm">
              <q-card class="shadow-2">
                <q-card-section>
                  <div class="text-weight-bold text-h6">سوالات متداول</div>
                </q-card-section>

                <q-expansion-item label="وضعیت‌های مختلف رزومه به چه معناست؟">
                  <q-card>
                    <q-card-section>
                      <div>
                        <span class="text-bold">دریافت شده توسط کارفرما:</span>
                        <span class="text-grey-7">
                          رزومه شما در پنل سازمان قرار گرفت و کارشناسان سازمان
                          در حال بررسی اولیه آن هستند.
                        </span>
                      </div>

                      <br />

                      <div>
                        <span class="text-bold text-warning"
                          >در اولویت بررسی:</span
                        >
                        <span class="text-grey-7">
                          رزومه شما در اولویت بررسی سازمان قرار گرفته است و
                          کارشناسان سازمان در حال بررسی بیشتر بر روی رزومه شما
                          هستند.
                        </span>
                      </div>

                      <br />

                      <div>
                        <span class="text-bold text-positive"
                          >تایید اولیه:</span
                        >
                        <span class="text-grey-7"
                          >شما با موفقیت مرحله بررسی را پشت سر گذاشتید و کارفرما
                          رزومه‌ی شما را تایید اولیه کرده است. این وضعیت لزوما
                          به معنی دعوت قطعی برای مصاحبه نیست.
                        </span>
                      </div>

                      <br />

                      <div>
                        <span class="text-bold text-negative">رد شده:</span>
                        <span class="text-grey-7">
                          کارفرما تصمیم گرفته است فرایند جذب را با کاندیدای
                          دیگری ادامه دهد و رزومه ارسالی شما را رد نمود.
                        </span>
                      </div>

                      <br />

                      <div>
                        <span class="text-bold text-grey-8">بسته شده:</span>
                        <span class="text-grey-7">
                          کارفرما فرد مورد نظر خود را استخدام کرده است و آگهی را
                          بسته است.
                        </span>
                      </div>
                    </q-card-section>
                  </q-card>
                </q-expansion-item>

                <q-separator inset class="q-my-sm" />

                <q-expansion-item
                  label="آیا می‌توانم از رزومه‌ای که قبلا ارسال کرده‌ام، انصراف دهم؟"
                >
                  <q-card>
                    <q-card-section>
                      <div>
                        <span class="text-grey-7">
                          چنانچه رزومه شما توسط سازمان دیده نشده باشد، می‌توانید
                          با استفاده از گزینه انصراف از ارسال رزومه،از ارسال
                          رزومه انصراف دهید.
                        </span>
                      </div>
                    </q-card-section>
                  </q-card>
                </q-expansion-item>

                <q-separator inset class="q-my-sm" />

                <q-expansion-item
                  label="رزومه من نزدیک به سه هفته است که در حال بررسی است، چرا کارفرما وضعیت رزومه ارسالی من را تعیین نمی‌کند؟"
                >
                  <q-card>
                    <q-card-section>
                      <div>
                        <span class="text-grey-7">
                          سازمانها، رزومه‌های دریافتی را بر اساس میزان انطباق با
                          شرایط مد نظر خود بررسی می‌کنند. اگر تا این لحظه رزومه
                          شما هنوز در حال بررسی است و وارد مراحل بعدی نشده است،
                          به احتمال زیاد رزومه شما حداقل های مدنظر کارفرما را در
                          مقایسه با سایر رزومه‌های دریافتی نداشته است.
                          <br />
                          لازم به ذکر است که جاب‌ویژن از تمام کارفرمایان درخواست
                          کرده است که در حداقل زمان ممکن، وضعیت کارجویان را به
                          روز رسانی نمایند تا کارجویان را از بلاتکلیفی خارج
                          کنند. متاسفانه در برخی از موارد به دلیل کثرت رزومه‌های
                          دریافتی، کارفرمایان وضعیت تک تک کارجویان را در پنل خود
                          به‌روز نمی کنند و رزومه شما در همان وضعیت در حال بررسی
                          باقی می ماند. جاب‌ویژن با تمهیداتی که اندیشیده است
                          تلاش می کند تا این موارد را به حداقل برساند.
                        </span>
                      </div>
                    </q-card-section>
                  </q-card>
                </q-expansion-item>

                <q-separator inset class="q-my-sm" />

                <q-expansion-item
                  label="رزومه ارسالی من در حال بررسی بود که بعد از مراجعه دوباره به این صفحه، متوجه شدم این آگهی بسته شده است. دلیل این موضوع چیست؟"
                >
                  <q-card>
                    <q-card-section>
                      <div>
                        <span class="text-grey-7">
                          آگهی شغلی بسته شده به این معناست که سازمان نیروی
                          موردنظر خود را جذب کرده است و دیگر به دنبال استخدام در
                          این موقعیت شغلی نیست.
                        </span>
                      </div>
                    </q-card-section>
                  </q-card>
                </q-expansion-item>

                <q-separator inset class="q-my-sm" />

                <q-expansion-item
                  label="هنگامی که رزومه من تایید اولیه شد، باید چه کاری انجام دهم؟"
                >
                  <q-card>
                    <q-card-section>
                      <div>
                        <span class="text-grey-7">
                          در این حالت، لازم نیست به دنبال برقراری ارتباط یا تماس
                          با سازمان باشید بلکه به زودی خود سازمانها برای تعیین
                          زمان جلسه مصاحبه با شما تماس خواهند گرفت. لازم به تذکر
                          است که لزوما پس از تایید، سریعا برای تعیین زمان مصاحبه
                          با شما تماس نمی‌گیرند؛ سازمانها معمولا چندین رزومه را
                          تایید می‌کنند اما همه این رزومه‌ها برای آنها از اولویت
                          یکسانی برخوردار نیست. بنابراین به ترتیب اولویت، با
                          آنها ارتباط گرفته و زمان جلسه مصاحبه را با آنها تعیین
                          خواهند کرد
                        </span>
                      </div>
                    </q-card-section>
                  </q-card>
                </q-expansion-item>

                <q-separator inset class="q-my-sm" />

                <q-expansion-item
                  label='وضعیت من چند روزی بود که در حالت "تایید اولیه" بود، با این حال تماسی با من گرفته نشد و آگهی در حال حاضر بسته شده است. آیا من کماکان باید منتظر تماس از طرف سازمان باشم؟'
                >
                  <q-card>
                    <q-card-section>
                      <div>
                        <span class="text-grey-7">
                          سازمانها معمولا افراد مختلف تایید شده را اولویت‌بندی
                          کرده و جلسات مصاحبه را براساس این اولویتها تعیین
                          می‌کنند. اگر از تایید شدن شما زمان زیادی می‌گذرد و
                          هنوز با شما تماس گرفته نشده احتمالا به این معناست که
                          سازمان در مصاحبه با متقاضیان دیگری که اولویت بالاتری
                          نسبت به شما داشتند نیروی مورد نظر خود را جذب کرده است.
                        </span>
                      </div>
                    </q-card-section>
                  </q-card>
                </q-expansion-item>

                <q-separator inset class="q-my-sm" />

                <q-expansion-item
                  label="در مواردی که رزومه‌ام رد شده است، چگونه می‌توانم از علت رد آنها آگاه شوم؟"
                >
                  <q-card>
                    <q-card-section>
                      <div>
                        <span class="text-grey-7">
                          جاب‌ویژن این امکان را برای سازمانها فراهم کرده است که
                          پس از رد کردن رزومه ارسالی هر کارجو، علت رد آن را
                          اعلام کرده و به آنها بازخورد دهند. در پنل کارفرما هم
                          به روش‌های مختلف کارفرمایان را نسبت به این بازخورد و
                          اعلام علت رد رزومه ارسالی، ترغیب می‌کنیم. این علت رد و
                          بازخورد سازمان در جزییات هر رزومه ارسالی شما مشخص
                          می‌باشد. لازم به ذکر است که متاسفانه برخی از سازمانها
                          علیرغم وجود این امکان و تمهیداتی که اندیشیده‌ایم، بدون
                          اعلام علت، رزومه را رد می‌کنند. در این صورت در بخش علت
                          رد، موردی درج نخواهد شد.
                        </span>
                      </div>
                    </q-card-section>
                  </q-card>
                </q-expansion-item>

                <q-separator inset class="q-my-sm" />

                <q-expansion-item
                  label="آیا می‌توانم در مورد جلسه مصاحبه سازمان، نظرم را به اشتراک بگذارم؟"
                >
                  <q-card>
                    <q-card-section>
                      <div>
                        <span class="text-grey-7">
                          بله. چنانچه رزومه شما در وضعیت تایید شده قرار گرفت و
                          به جلسه مصاحبه دعوت شدید، می‌توانید بازخورد مثبت یا
                          منفی خود از جلسه مصاحبه را با ما به اشتراک بگذارید.
                          این بازخورد شما هم بصورت بی‌نام به سازمان منتقل خواهد
                          شد و هم در محاسبه نمره سازمان در جاب‌ویژن و رده‌بندی
                          سازمانها تاثیرگذار است.
                        </span>
                      </div>
                    </q-card-section>
                  </q-card>
                </q-expansion-item>

                <q-separator inset class="q-my-sm" />

                <q-expansion-item
                  label="از کجا می‌توانم بفهمم که رزومه‌ام در چه زمانی مورد بررسی قرار گرفت؟"
                >
                  <q-card>
                    <q-card-section>
                      <div>
                        <span class="text-grey-7">
                          با کلیک بر روی هر فرصت شغلی و باز شدن جزییات آن، مشخص
                          شده است که رزومه شما در چه زمانی توسط کارفرما مورد
                          بررسی قرار گرفته است.
                        </span>
                      </div>
                    </q-card-section>
                  </q-card>
                </q-expansion-item>

                <q-separator inset class="q-my-sm" />

                <q-expansion-item
                  label="آخرین زمان مراجعه کارفرما به پنل رزومه‌های دریافتی این شغل به چه معناست؟"
                >
                  <q-card>
                    <q-card-section>
                      <div>
                        <span class="text-grey-7">
                          در این بخش، مشخص می‌شود که کارفرما آخرین بار در چه
                          زمانی به رزومه‌های دریافتی این فرصت شغلی سر زده است؟
                        </span>
                      </div>
                    </q-card-section>
                  </q-card>
                </q-expansion-item>

                <q-separator inset class="q-my-sm" />
              </q-card>
            </div>
          </q-tab-panel>

          <q-tab-panel class="row" name="suggestion">
            <!-- jobs Count and Sorting -->

            <div class="col-8 row">
              <div
                style="background-color: white; height: 50px"
                class="col-12 row justify-between"
              >
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

              <!-- jobs List -->

              <div
                style="margin-top: -250px"
                class="col-12 row justify-between content-center items-center"
              >
                <div class="col-12 q-my-xs row justify-center items-center">
                  <q-list
                    class="custom-border col-12 bg-white q-my-sm"
                    bordered
                    separator
                  >
                    <q-item class="col-12 q-my-xs">
                      <q-item-section class="q-pa-md" top avatar>
                        <q-avatar>
                          <img
                            src="https://cdn.quasar.dev/img/boy-avatar.png"
                          />
                        </q-avatar>
                        <q-badge class="q-mt-sm">
                          5.0
                          <q-icon
                            name="star"
                            color="green"
                            text-color="green"
                            class="q-ml-xs"
                          />
                        </q-badge>
                      </q-item-section>

                      <q-item-section caption class="q-pa-md">
                        <div class="row">
                          <q-badge
                            class="q-my-xs q-mx-xs"
                            color="red-1"
                            text-color="negative"
                            label="فوری"
                          />
                        </div>

                        <q-item-label class="text-weight-bold"
                          >نام فرصت شغلی</q-item-label
                        >
                        <q-item-label class="text-weight-thin q-pt-xs">
                          نام شرکت
                        </q-item-label>
                        <q-item-label caption>
                          شهر محل کار <span class="text-grey-5"> | </span>
                          <span class="text-positive"
                            >20 - 25 میلیون تومان</span
                          ></q-item-label
                        >
                      </q-item-section>

                      <q-item-section class="q-pa-md" side top>
                        <q-btn flat icon="favorite_outline" />
                        <q-btn flat icon="block" />
                      </q-item-section>
                    </q-item>

                    <div class="row justify-center q-my-md">
                      <q-separator class="col-10 q-px-md" style="height: 1px" />

                      <div class="col-12 row justify-center q-mt-sm">
                        <div class="col-10 row justify-between items-center">
                          <div class="col-3">17 روز پیش</div>

                          <div class="col-4 row justify-end">
                            <q-btn color="positive" label="ارسال رزمه" />
                          </div>
                        </div>
                      </div>
                    </div>
                  </q-list>

                  <q-list
                    class="custom-border col-12 bg-white q-my-sm"
                    bordered
                    separator
                  >
                    <q-item class="col-12 q-my-xs">
                      <q-item-section class="q-pa-md" top avatar>
                        <q-avatar>
                          <img
                            src="https://cdn.quasar.dev/img/boy-avatar.png"
                          />
                        </q-avatar>
                        <q-badge class="q-mt-sm">
                          4.4
                          <q-icon
                            name="star"
                            color="green"
                            text-color="green"
                            class="q-ml-xs"
                          />
                        </q-badge>
                      </q-item-section>

                      <q-item-section caption class="q-pa-md">
                        <q-item-label class="text-weight-bold"
                          >نام فرصت شغلی</q-item-label
                        >
                        <q-item-label class="text-weight-thin q-pt-xs">
                          نام شرکت
                        </q-item-label>
                        <q-item-label caption> شهر محل کار </q-item-label>
                      </q-item-section>

                      <q-item-section class="q-pa-md" side top>
                        <q-btn flat icon="favorite_outline" />
                        <q-btn flat icon="block" />
                      </q-item-section>
                    </q-item>

                    <div class="row justify-center q-my-md">
                      <q-separator class="col-10 q-px-md" style="height: 1px" />

                      <div class="col-12 row justify-center q-mt-sm">
                        <div class="col-10 row justify-between items-center">
                          <div class="col-3">امروز</div>

                          <div class="col-4 row justify-end">
                            <q-btn color="positive" label="ارسال رزمه" />
                          </div>
                        </div>
                      </div>
                    </div>
                  </q-list>
                </div>
              </div>
            </div>

            <!-- LeftSide Content -->

            <div class="col-4 row justify-center q-pl-sm">
              <q-card class="shadow-2">
                <q-card-section>
                  <div class="text-weight-medium">
                    <q-icon name="work" />
                    تنظیمات فرصت‌های شغلی پیشنهادی
                  </div>
                </q-card-section>

                <q-separator />

                <div class="row">
                  <div class="q-my-md col-12">
                    <div class="text-caption text-grey-6 q-mx-sm">
                      استان های مورد علاقه
                    </div>
                    <div class="q-mt-sm q-mx-sm">همه استان‌ها</div>
                    <!-- <q-skeleton class="q-mt-sm q-mx-sm" type="rect" /> -->
                  </div>

                  <div class="q-my-md col-12">
                    <div class="text-caption text-grey-6 q-mx-sm">
                      حوزه‌های شغلی مورد علاقه
                    </div>
                    <div class="q-mt-sm q-mx-sm">
                      توسعه نرم افزار و برنامه نویسی
                    </div>
                    <!-- <q-skeleton class="q-mt-sm q-mx-sm" type="rect" /> -->
                  </div>

                  <div class="q-my-md col-12">
                    <div class="text-caption text-grey-6 q-mx-sm">
                      نوع همکاری مورد نظر
                    </div>
                    <div class="q-mt-sm q-mx-sm">
                      تمام وقت، پاره وقت، قراردادی / پروژه ای
                    </div>
                    <!-- <q-skeleton class="q-mt-sm q-mx-sm" type="rect" /> -->
                  </div>

                  <div class="q-my-md col-12">
                    <q-separator class="q-mb-lg" />

                    <div class="text-caption text-grey-6 q-mx-sm">
                      تمایل به دورکاری
                    </div>
                    <div class="q-mt-sm q-mx-sm">دورکاری، حضوری</div>
                    <!-- <q-skeleton class="q-mt-sm q-mx-sm" type="rect" /> -->
                  </div>

                  <div class="q-my-md col-12 text-center">
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

            <div class="col-9 row">
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
              class="col-3 row justify-center q-pl-sm bg-white text-center"
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

            <div class="col-9 row">
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
                      <q-btn outline color="primary" label="لیست شرکت ها" />
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- LeftSide Content -->

            <div
              class="col-3 row justify-between shadow-1 q-my-md"
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

export default {
  setup() {
    const getMessage = ref(true);
    const tab = ref("CVSent");
    const CVPage = ref("pageOne");
    const categories = ref("all");

    return {
      CVPage,
      getMessage,
      tab,
      categories,
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

.br-10 {
  border-radius: 10px !important;
}
</style>
