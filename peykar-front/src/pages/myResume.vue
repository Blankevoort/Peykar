<template>
  <q-page style="background-color: #f8f9fa">
    <!-- large-4k Screen Content -->

    <div class="gt-md">
      <div class="row justify-center q-mx-xl">
        <div
          class="col-8 row justify-between items-center q-px-md q-py-sm bg-white br-10"
        >
          <div>
            <q-icon size="20px" name="visibility" />
            <span class="q-px-sm"> نحوه نمایش رزومه به: </span>
          </div>

          <q-btn-dropdown flat :label="preferred">
            <q-list>
              <q-item clickable v-close-popup @click="preferred = 'خودم'">
                <q-item-section>
                  <q-item-label>خودم</q-item-label>
                </q-item-section>
              </q-item>

              <q-item clickable v-close-popup @click="preferred = 'کارفرما'">
                <q-item-section>
                  <q-item-label>کارفرما</q-item-label>
                </q-item-section>
              </q-item>
            </q-list>
          </q-btn-dropdown>

          <div class="col-4 row justify-end text-grey-8">
            <q-btn flat class="q-mx-sm" label="دانلود رزومه" icon="download" />

            <q-btn
              flat
              class="q-mx-sm"
              label="اشتراک گذاری رزومه"
              icon="share"
            />
          </div>
        </div>
      </div>

      <!-- Design -->

      <div class="row justify-center">
        <div class="col-8 q-my-md" style="padding: 0 32px">
          <div class="row" v-if="preferred == 'خودم'">
            <!-- Myself -->

            <div class="col-8 q-pr-md">
              <div class="full-width">
                <div class="bg-white br-10">
                  <div class="q-px-lg">
                    <div class="row">
                      <div class="col-12">
                        <q-badge
                          class="text-white text-bold"
                          style="background-color: #45c26f"
                        >
                          100%
                        </q-badge>
                      </div>
                    </div>

                    <div class="full-width">
                      <div class="row justify-between">
                        <div class="text-h6 text-bold q-mt-sm">درباره من</div>

                        <div>
                          <q-btn
                            dense
                            flat
                            class="text-grey-8"
                            label="ویرایش"
                            icon="edit"
                          />
                        </div>
                      </div>
                    </div>

                    <div class="col-12 row">
                      <div class="q-mt-md q-mb-lg row justify-between">
                        <div class="col-12 q-pr-xl">
                          <q-item class="full-width">
                            <q-item-section top avatar>
                              <q-avatar
                                size="64px"
                                color="blue-grey-3"
                                text-color="white"
                                @click="editToggle"
                              >
                                <q-icon size="80px" name="person" />
                              </q-avatar>

                              <div style="padding-left: 60px">
                                <q-tooltip
                                  style="background-color: #dde1e6 !important"
                                  v-model="editBTN"
                                >
                                  <q-btn
                                    dense
                                    flat
                                    class="text-grey-9"
                                    icon="border_color"
                                  />
                                </q-tooltip>
                              </div>
                            </q-item-section>

                            <q-item-section class="q-px-md">
                              <q-item-label
                                style="font-size: 16px"
                                class="text-bold"
                                >معین صداقتی</q-item-label
                              >
                              <q-item-label class="q-pt-md" caption lines="2">
                                دولوپر فول استک در شرکت آیترونیک
                                <q-icon
                                  class="q-pl-sm"
                                  name="edit"
                                  size="18px"
                                />
                              </q-item-label>
                            </q-item-section>

                            <q-item-section side>
                              <q-btn
                                class="col-8"
                                flat
                                color="primary"
                                style="border: 2px dashed #5660f2"
                                label="افزودن"
                                icon="add"
                              />

                              <q-avatar class="q-mx-sm" size="25px">
                                <q-img
                                  src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAOEAAADhCAMAAAAJbSJIAAAAt1BMVEULZsP////H1vEAYsMAWr4AV79IhM3V5fIAYMMMZcRIhsn//v5ymtQMZMUzd8kLZsQAasM0gsoLZsD///sAXr0AVMIqeckAXbwAYb4AX8UAVLj//f/7//8JZckAUcEAV8O80Or1+v+gvOaMrtzI3PA7fMZkmdLd6Pnl7vh2otnl8vcgd86Lqditx+ZAfcyYtNxnmNiFotRBjtA1eNO2zOuOtd2ev+R7qNm7zu7W6fJYj9bK4PDH3PdQecCoAAAFuElEQVR4nO2cC1PbOBRGpdoGCyNk5DhxQHkSaB4Fwm5Ld2H//+9a2YU8qOTSjZHXnu/MdJgBJ6PTe/W4smxCAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAACoAEZE/o8xIaUUsu7mfASSxUxLeh4jA8JF3c2pHs5I30/J3fn5Kgg6bYyh7ASL8YQWHE+7Aau7QZUiCM+CK0V3mF37jLC8c7aCmPvXc5pcvuqpJKF0mrYoVbl/o72iTRAjSpOIfr6Q+RDbCvo3VEct2qRopJJLrTsPZBsMJRPZHd3rg9vOmMoWGOrJvaf7oNGQLnotMIx554pGFkPV43W373A4D1SkzIoRve/X3b4K8Bbm+BUsh3U373BkMC4xpKvmT/kyndj9IvrFq7uBByP7dkHdOW/Duht4MNmZbaqg+RA79utu4MGwO7uh/sunFhh2226YScuS7YdhC7JUDEv6oZ7ymz/SSH9WEkJ60vzZYhBelRiqi7rbVwXCaqinw6Du1h0OI72xvSeeNX/RRhgbxHS3wN/N0jaEkMSEhN/NowydtKE8JJLxvLz4KU/1LxJdWLQgS3PkSCteqo3lS8oeNX+m2CDTb7t9UUV60b1cNX+y3yK4f3e8n6JXPa9FO8KC6TE1fRpv0nQ+DTu8DTuJ+3h+ev1l+nh7v47TrO7GfBBMeP1eP+wMWpSf+zDBOIulJHJQd1M+CEbk64/WRhEAUBfCwtt1NxN5tWVkU4QM8mMBkvA4PxyQeV7mMcKkHpwlacAArecR0/+GHnvl7tjLxYCHvdEwPlkvHtZ//Jmlvh/qeajG8dkSF5b77F6X25hizTnbKyS9gDx8ne+sc49vT2VQ491WFlvQkdlrucyTzkC2s0hnrBM+zF5r6KISU0XR8nzl+TU5eke2XZq3O97Bse3CblFKSiG9cDC1ft3tymeCS+fZ+luGlv3xbhEdNsj8b7TkLgH9GmYxdx7JSgxfLjiZ2Ha1CvSnF0P+/46hhcJQpI80SRJlN6SJojP321uHxzDR/ZCxsDcrS9AXFF3GoeOTSNUYEsmWNLIdW9m7eBJnbjO1IsNQd8FE/dpQf4UauC1AqzEMlvpHoi5Nf9+/NoroMmhYDBXtDt/TB7fMUiLc7XRVEcPVIo/ge/10Ln8Pibu+eLhhRFd6aabsd8vfXp9ENGbuJo0KYhjNqbpMSubBfVR+QGDk7pZIFWua/8C1uymxHsNk5u5xgHoMFV0564j1GEb0ttduQ714c3bOo6YsVfTIVUesaSxV7k521pWlydzVSY/qDJVeVNP5dL3KPBavHye/WsfFXDoZT6sz1NXh7OQi7BPGOPP6w5tJUlpr3PTdrL4rzFK1TkP2Y1NKl/EyHNlPBebc993cxavOcN4pNhUFL24A6KW1HH4qu/6vXqNiGCXzUSG3Rzq3PpBD6d8jF35VGeoZPH++5m3BkB+yttYcl45K/aqy9Mg4vflleZq5KRIrMhyPJBc/jxzeSclnYjePxVdkyJh51EiX9lnxzM25q2oMx75ll7dza/162g0bZPiUmWMo+6bTqy8cNcgwGXFp3HjhvFti2G+IYZLQZ9uTJ4KFdsMTrykzfkQfrZUQv7CvTZtjSOmD9Twx9+eWzzTIUNfra/uJaf+5+YZ6WXZnbSr3/2mBoXq5kW+Cl6zbmmRof7im9Yay9YbtjyEMP1yPwHAXGBqBoQNguAWGRmDoABhugaERGDoAhltgaASGDoDhFhgagaEDYLgFhkZg6AAYboGhERg6AIZbYGgEhg6A4RYYGoGhA9puyHhmN5z5e2fpfdubP5Iyw8D64Exy5+IAreCD9xt+tl5pP7kn7Yb0yHPwNIJkMj63cN3df39Ftj5dnJopeR1v9mT5zOli5SJL84ckTO9+Kt7/JN688cgLLXh2QUYy26dC0d63bAIAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAUBH/AiyZj3J3eJA/AAAAAElFTkSuQmCC"
                                />
                              </q-avatar>
                            </q-item-section>
                          </q-item>
                        </div>

                        <div class="row q-px-md">
                          <div class="col-12 q-mt-md text-grey-8">
                            معین صداقتی متولد سال 1386/9/9. از 13 سالگی شروع به
                            یاد گیری برنامه نویسی کردم و از 15 سالگی به صورت جدی
                            برنامه نویسی میکنم.
                          </div>

                          <div dir="ltr" class="col-12 q-mt-lg text-grey-8">
                            Moeen Sedaqati born on 9/9/1386. I started learning
                            programming when I was 13 years old, and I started
                            programming seriously when I was 15 years old.
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="q-mt-lg">
                <div class="full-width">
                  <div class="bg-white br-10">
                    <div class="q-px-lg">
                      <div class="row">
                        <div class="col-12">
                          <q-badge
                            class="text-white text-bold"
                            style="background-color: #45c26f"
                          >
                            100%
                          </q-badge>
                        </div>

                        <div class="full-width">
                          <div class="row justify-between">
                            <div class="text-h6 text-bold q-mt-sm">
                              اطلاعات اولیه
                            </div>

                            <div>
                              <q-btn
                                dense
                                flat
                                class="text-grey-8"
                                label="ویرایش"
                                icon="edit"
                              />
                            </div>
                          </div>
                        </div>

                        <div class="row justify-between q-mt-lg full-width">
                          <div class="col-12 row justify-between q-pb-lg">
                            <div class="col-5">
                              <div>
                                <div class="text-weight-thin text-grey-8">
                                  نام و نام خانوادگی
                                </div>
                                <div class="text-bold">معین صداقتی</div>
                              </div>

                              <div class="q-mt-md">
                                <div class="text-weight-thin text-grey-8">
                                  جنسیت
                                </div>
                                <div class="text-bold">مرد</div>
                              </div>

                              <div class="q-mt-md">
                                <div class="text-weight-thin text-grey-8">
                                  وضعیت تاهل
                                </div>
                                <div class="text-bold">مجرد</div>
                              </div>

                              <div class="q-mt-md">
                                <div class="text-weight-thin text-grey-8">
                                  وضعیت نظام وظیفه
                                </div>
                                <div class="text-bold">معافیت تحصیلی</div>
                              </div>

                              <div class="q-mt-md">
                                <div class="text-weight-thin text-grey-8">
                                  شهر محل سکونت
                                </div>
                                <div class="text-bold">گنبد کاووس</div>
                              </div>

                              <div class="q-mt-md">
                                <div class="text-weight-thin text-grey-8">
                                  محل سکونت
                                </div>
                                <div class="text-bold">
                                  خیابان بعثت غربی نرسیده به چهارراه فردوسی جنب
                                  یخچال سازی صوفی زاده
                                </div>
                              </div>

                              <div class="q-mt-md">
                                <div class="text-weight-thin text-grey-8">
                                  تاریخ تولد
                                </div>
                                <div class="text-bold">1386/09/09</div>
                              </div>

                              <div class="q-mt-md">
                                <div class="text-weight-thin text-grey-8">
                                  شماره ثابت
                                </div>
                                <div class="text-bold">33231884</div>
                              </div>

                              <div class="q-mt-md">
                                <div class="text-weight-thin text-grey-8">
                                  حقوق درخواستی
                                </div>
                                <div class="text-bold">8 - 6 میلیون تومان</div>
                              </div>

                              <div class="q-mt-md">
                                <div class="text-weight-thin text-grey-8">
                                  گروه شغلی مورد علاقه
                                </div>
                                <div class="text-bold">
                                  توسعه نرم افزار و برنامه نویسی
                                </div>
                              </div>
                            </div>

                            <div dir="ltr" class="col-5">
                              <div>
                                <div class="text-weight-thin text-grey-8">
                                  First and Last Name
                                </div>
                                <div class="text-bold">Moeen Sedaqati</div>
                              </div>

                              <div class="q-mt-md">
                                <div class="text-weight-thin text-grey-8">
                                  Gender
                                </div>
                                <div class="text-bold">Male</div>
                              </div>

                              <div class="q-mt-md">
                                <div class="text-weight-thin text-grey-8">
                                  Marital Status
                                </div>
                                <div class="text-bold">Single</div>
                              </div>

                              <div class="q-mt-md">
                                <div class="text-weight-thin text-grey-8">
                                  Military Service Status
                                </div>
                                <div class="text-bold">
                                  Educational Exemption
                                </div>
                              </div>

                              <div class="q-mt-md">
                                <div class="text-weight-thin text-grey-8">
                                  City
                                </div>
                                <div class="text-bold">Gonbad kavoos</div>
                              </div>

                              <div class="q-mt-md">
                                <div class="text-weight-thin text-grey-8">
                                  Region
                                </div>
                                <div class="text-bold">
                                  West Ba'ath St. has not reached the Ferdowsi
                                  intersection, next to Sufizadeh refrigerator
                                </div>
                              </div>

                              <div class="q-mt-md">
                                <div class="text-weight-thin text-grey-8">
                                  Date of Birth
                                </div>
                                <div class="text-bold">2007-11-30</div>
                              </div>

                              <div class="q-mt-md">
                                <div class="text-weight-thin text-grey-8">
                                  Phone Number
                                </div>
                                <div class="text-bold">33231884</div>
                              </div>

                              <div class="q-mt-md">
                                <div class="text-weight-thin text-grey-8">
                                  Expected Salary
                                </div>
                                <div class="text-bold">
                                  6 - 8 Million Tomans
                                </div>
                              </div>

                              <div class="q-mt-md">
                                <div class="text-weight-thin text-grey-8">
                                  Preferred Job Category
                                </div>
                                <div class="text-bold">
                                  IT - Software Development (Web,Moblie,…)
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

              <!-- Educational Records -->

              <div class="q-mt-lg">
                <div class="full-width">
                  <div class="bg-white br-10">
                    <div class="q-px-lg">
                      <div class="row">
                        <div class="col-12">
                          <q-badge
                            class="text-white text-bold"
                            style="background-color: #45c26f"
                          >
                            100%
                          </q-badge>
                        </div>

                        <div class="col-12 q-mt-md">
                          <div class="col-12 row justify-between">
                            <div class="text-h6 text-bold q-mt-sm">
                              سوابق تحصیلی
                            </div>

                            <!-- <div>
                            <q-btn
                              dense
                              flat
                              color="primary"
                              label="افزودن"
                              icon="add_circle"
                              class="q-pr-md"
                            />
                          </div> -->
                          </div>
                        </div>

                        <div class="col-12 q-mt-md q-mb-sm">
                          <q-checkbox v-model="val" label="تحصیلات دانشگاهی" />
                        </div>

                        <div class="col-12 q-mb-md q-ml-md">
                          <q-radio
                            class="q-mb-xs full-width"
                            v-model="shape"
                            val="DY"
                            label="مدرک تحصیلی دیپلم دارم."
                          />
                          <q-radio
                            class="q-my-xs full-width"
                            v-model="shape"
                            val="DN"
                            label="مدرک تحصیلی زیر دیپلم دارم."
                          />
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Experience -->

              <div class="q-mt-lg">
                <div class="full-width">
                  <div class="bg-white br-10">
                    <div class="q-px-lg">
                      <div class="row">
                        <div class="col-12">
                          <q-badge
                            class="text-white text-bold"
                            style="background-color: #45c26f"
                          >
                            100%
                          </q-badge>
                        </div>

                        <div class="col-12 q-mt-md">
                          <div class="col-12 row justify-between">
                            <div class="text-h6 text-bold q-mt-sm">
                              سوابق شغلی
                            </div>

                            <div>
                              <q-btn
                                dense
                                flat
                                color="primary"
                                label="افزودن"
                                icon="add_circle"
                                class="q-pr-md"
                              />
                            </div>
                          </div>
                        </div>

                        <div
                          class="col-12 q-mt-md q-mb-md row justify-center items-center"
                        >
                          <q-item
                            style="background-color: white; border-radius: 8px"
                            class="col-12 q-my-xs"
                          >
                            <q-item-section avatar>
                              <div
                                class="br-10 row q-py-md"
                                style="background-color: #f6f7f9 !important"
                              >
                                <q-btn
                                  color="grey-7"
                                  flat
                                  dense
                                  class="col-12"
                                  icon="edit"
                                />
                                <q-btn
                                  color="grey-7"
                                  flat
                                  dense
                                  class="col-12"
                                  icon="delete "
                                />
                              </div>
                            </q-item-section>

                            <q-item-section class="q-pa-md">
                              <q-item-label class="text-bold"
                                >دولوپر فول استک در شرکت آیترونیک</q-item-label
                              >

                              <div class="q-my-md">
                                <span class="text-bold">آیترونیک</span>
                              </div>

                              <div class="text-grey-6">از تیر 1402 تاکنون</div>
                            </q-item-section>

                            <q-item-section class="q-pa-sm row q-mr-md" side>
                              <div class="text-bold text-black">
                                Full Stack Developer
                              </div>

                              <div class="text-bold q-my-md text-black">
                                Aytronic
                              </div>

                              <div class="text-grey-6">June 2023 - Present</div>
                            </q-item-section>
                          </q-item>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Langs -->

              <div class="q-mt-lg">
                <div class="full-width">
                  <div class="bg-white br-10">
                    <div class="q-px-lg">
                      <div class="row">
                        <div class="col-12">
                          <q-badge
                            class="text-white text-bold"
                            style="background-color: #45c26f"
                          >
                            100%
                          </q-badge>
                        </div>

                        <div class="col-12 q-mt-md">
                          <div class="col-12 row justify-between">
                            <div class="text-h6 text-bold q-mt-sm">زبان‌ها</div>

                            <div>
                              <q-btn
                                dense
                                flat
                                color="primary"
                                label="افزودن"
                                icon="add_circle"
                                class="q-pr-md"
                              />
                            </div>
                          </div>
                        </div>

                        <div class="col-12 row justify-between q-my-md">
                          <div class="col-5 row items-center">
                            <div>
                              <div class="row items-center q-mt-md">
                                <q-icon
                                  size="20px"
                                  class="q-px-xs"
                                  color="grey-7"
                                  name="delete"
                                />
                                <div
                                  class="text-white row q-px-sm q-py-xs br-10"
                                  style="
                                    background-color: #5c6573 !important;
                                    padding-top: 5px;
                                    padding-bottom: 5px;
                                  "
                                >
                                  <div class="text-bold q-ml-sm">انگلیسی</div>

                                  <q-separator
                                    color="white"
                                    class="q-mx-sm q-my-xs"
                                    vertical
                                  />

                                  <div>بالاتر از متوسط</div>
                                </div>
                              </div>
                            </div>

                            <div>
                              <div class="row items-center q-mt-md">
                                <q-icon
                                  size="20px"
                                  class="q-px-xs"
                                  color="grey-7"
                                  name="delete"
                                />
                                <div
                                  class="text-white row q-px-sm q-py-xs br-10"
                                  style="
                                    background-color: #5c6573 !important;
                                    padding-top: 5px;
                                    padding-bottom: 5px;
                                  "
                                >
                                  <div class="text-bold q-ml-sm">فارسی</div>

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

                          <div class="col-5 row justify-end q-mr-md">
                            <div>
                              <div class="row items-center q-mt-md">
                                <div
                                  class="text-white row q-px-sm q-py-xs br-10"
                                  style="
                                    background-color: #5c6573 !important;
                                    padding-top: 5px;
                                    padding-bottom: 5px;
                                  "
                                >
                                  <div>Upper Intermediate</div>

                                  <q-separator
                                    color="white"
                                    class="q-mx-sm q-my-xs"
                                    vertical
                                  />

                                  <div class="text-bold q-ml-sm">English</div>
                                </div>
                              </div>
                            </div>

                            <div>
                              <div class="row items-center q-mt-md">
                                <div
                                  class="text-white row q-px-sm q-py-xs br-10"
                                  style="
                                    background-color: #5c6573 !important;
                                    padding-top: 5px;
                                    padding-bottom: 5px;
                                  "
                                >
                                  <div>Advanced</div>

                                  <q-separator
                                    color="white"
                                    class="q-mx-sm q-my-xs"
                                    vertical
                                  />

                                  <div class="text-bold q-ml-sm">Persian</div>
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

              <!-- Skills -->

              <div class="q-mt-lg">
                <div class="full-width">
                  <div class="bg-white br-10">
                    <div class="q-px-lg">
                      <div class="row">
                        <div class="col-12">
                          <q-badge
                            class="text-white text-bold"
                            style="background-color: #45c26f"
                          >
                            100%
                          </q-badge>
                        </div>

                        <div class="col-12 q-mt-md">
                          <div class="col-12 row justify-between">
                            <div class="text-h6 text-bold q-mt-sm">
                              مهارت های نرم افزاری
                            </div>

                            <div>
                              <q-btn
                                dense
                                flat
                                color="primary"
                                label="افزودن"
                                icon="add_circle"
                                class="q-pr-md"
                              />
                            </div>
                          </div>
                        </div>

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

                                <div
                                  class="text-bold q-ml-sm"
                                  style="font-size: 13px"
                                >
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

                                <div
                                  class="text-bold q-ml-sm"
                                  style="font-size: 13px"
                                >
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

                                <div
                                  class="text-bold q-ml-sm"
                                  style="font-size: 13px"
                                >
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
                    </div>
                  </div>
                </div>
              </div>

              <!-- Additional Skills -->

              <div class="q-mt-lg">
                <div class="full-width">
                  <div class="bg-white br-10">
                    <div class="q-px-lg">
                      <div class="row">
                        <div class="col-12">
                          <q-badge
                            class="text-white text-bold"
                            style="background-color: #45c26f"
                          >
                            100%
                          </q-badge>
                        </div>

                        <div class="col-12 q-mt-md">
                          <div class="col-12 row justify-between">
                            <div class="text-h6 text-bold q-mt-sm">
                              مهارت های تکمیلی
                            </div>

                            <div>
                              <q-btn
                                dense
                                flat
                                color="primary"
                                label="افزودن"
                                icon="add_circle"
                                class="q-pr-md"
                              />
                            </div>
                          </div>
                        </div>

                        <div class="full-width">
                          <div class="q-my-lg">
                            <div class="row">
                              <div class="col">
                                <div class="col-12 row items-center q-mt-sm">
                                  <div>
                                    <div
                                      class="text-white row q-px-sm q-pb-xs"
                                      style="
                                        padding-top: 5px;
                                        padding-bottom: 5px;
                                      "
                                    >
                                      <div
                                        class="text-grey-6"
                                        style="font-size: 13px"
                                      >
                                        مهارت‌ها در رزومه فارسی (6 مهارت)
                                      </div>
                                    </div>
                                  </div>
                                </div>

                                <!-- Skills -->

                                <div class="col-12 row items-center q-mt-sm">
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

                                      <div
                                        class="text-bold q-ml-sm"
                                        style="font-size: 13px"
                                      >
                                        برنامه نویسی فرانت اند
                                      </div>
                                    </div>
                                  </div>
                                </div>

                                <div class="col-12 row items-center q-mt-sm">
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

                                      <div
                                        class="text-bold q-ml-sm"
                                        style="font-size: 13px"
                                      >
                                        سی اس اس
                                      </div>
                                    </div>
                                  </div>
                                </div>

                                <div class="col-12 row items-center q-mt-sm">
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

                                      <div
                                        class="text-bold q-ml-sm"
                                        style="font-size: 13px"
                                      >
                                        فیگما
                                      </div>
                                    </div>
                                  </div>
                                </div>

                                <div class="col-12 row items-center q-mt-sm">
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

                                      <div
                                        class="text-bold q-ml-sm"
                                        style="font-size: 13px"
                                      >
                                        اچ تی ام ال
                                      </div>
                                    </div>
                                  </div>
                                </div>

                                <div class="col-12 row items-center q-mt-sm">
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

                                      <div
                                        class="text-bold q-ml-sm"
                                        style="font-size: 13px"
                                      >
                                        کویزار
                                      </div>
                                    </div>
                                  </div>
                                </div>

                                <div class="col-12 row items-center q-mt-sm">
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

                                      <div
                                        class="text-bold q-ml-sm"
                                        style="font-size: 13px"
                                      >
                                        لاراول
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>

                              <q-separator class="q-my-xs q-mx-xs" vertical />

                              <div class="col row">
                                <div
                                  class="col-12 row justify-end items-center q-mt-sm"
                                >
                                  <div>
                                    <div
                                      class="text-white row q-px-sm q-pb-xs q-mr-sm"
                                      style="
                                        padding-top: 5px;
                                        padding-bottom: 5px;
                                      "
                                    >
                                      <div
                                        class="text-grey-6"
                                        style="font-size: 13px"
                                      >
                                        Skills in English Resume (8 skills)
                                      </div>
                                    </div>
                                  </div>
                                </div>

                                <!-- Skills -->

                                <div
                                  class="col-12 row justify-end items-center q-mt-sm"
                                >
                                  <div>
                                    <div
                                      class="text-white row q-pl-sm q-py-xs br-8 q-mr-md"
                                      style="
                                        background-color: #5c6573 !important;
                                        padding-top: 5px;
                                        padding-bottom: 5px;
                                      "
                                    >
                                      <div
                                        class="text-bold q-mr-sm"
                                        style="font-size: 13px"
                                      >
                                        HTML
                                      </div>

                                      <q-icon
                                        size="20px"
                                        class="q-px-xs"
                                        color="grey-5"
                                        name="delete"
                                      />
                                    </div>
                                  </div>
                                </div>

                                <div
                                  class="col-12 row justify-end items-center q-mt-sm"
                                >
                                  <div>
                                    <div
                                      class="text-white row q-pl-sm q-py-xs br-8 q-mr-md"
                                      style="
                                        background-color: #5c6573 !important;
                                        padding-top: 5px;
                                        padding-bottom: 5px;
                                      "
                                    >
                                      <div
                                        class="text-bold q-ml-sm"
                                        style="font-size: 13px"
                                      >
                                        Quasar
                                      </div>

                                      <q-icon
                                        size="20px"
                                        class="q-px-xs"
                                        color="grey-5"
                                        name="delete"
                                      />
                                    </div>
                                  </div>
                                </div>

                                <div
                                  class="col-12 row justify-end items-center q-mt-sm"
                                >
                                  <div>
                                    <div
                                      class="text-white row q-pl-sm q-py-xs br-8 q-mr-md"
                                      style="
                                        background-color: #5c6573 !important;
                                        padding-top: 5px;
                                        padding-bottom: 5px;
                                      "
                                    >
                                      <div
                                        class="text-bold q-ml-sm"
                                        style="font-size: 13px"
                                      >
                                        vue.js
                                      </div>

                                      <q-icon
                                        size="20px"
                                        class="q-px-xs"
                                        color="grey-5"
                                        name="delete"
                                      />
                                    </div>
                                  </div>
                                </div>

                                <div
                                  class="col-12 row justify-end items-center q-mt-sm"
                                >
                                  <div>
                                    <div
                                      class="text-white row q-pl-sm q-py-xs br-8 q-mr-md"
                                      style="
                                        background-color: #5c6573 !important;
                                        padding-top: 5px;
                                        padding-bottom: 5px;
                                      "
                                    >
                                      <div
                                        class="text-bold q-ml-sm"
                                        style="font-size: 13px"
                                      >
                                        vue router
                                      </div>

                                      <q-icon
                                        size="20px"
                                        class="q-px-xs"
                                        color="grey-5"
                                        name="delete"
                                      />
                                    </div>
                                  </div>
                                </div>

                                <div
                                  class="col-12 row justify-end items-center q-mt-sm"
                                >
                                  <div>
                                    <div
                                      class="text-white row q-pl-sm q-py-xs br-8 q-mr-md"
                                      style="
                                        background-color: #5c6573 !important;
                                        padding-top: 5px;
                                        padding-bottom: 5px;
                                      "
                                    >
                                      <div
                                        class="text-bold q-ml-sm"
                                        style="font-size: 13px"
                                      >
                                        Vue CLi
                                      </div>

                                      <q-icon
                                        size="20px"
                                        class="q-px-xs"
                                        color="grey-5"
                                        name="delete"
                                      />
                                    </div>
                                  </div>
                                </div>

                                <div
                                  class="col-12 row justify-end items-center q-mt-sm"
                                >
                                  <div>
                                    <div
                                      class="text-white row q-pl-sm q-py-xs br-8 q-mr-md"
                                      style="
                                        background-color: #5c6573 !important;
                                        padding-top: 5px;
                                        padding-bottom: 5px;
                                      "
                                    >
                                      <div
                                        class="text-bold q-ml-sm"
                                        style="font-size: 13px"
                                      >
                                        Laravel
                                      </div>

                                      <q-icon
                                        size="20px"
                                        class="q-px-xs"
                                        color="grey-5"
                                        name="delete"
                                      />
                                    </div>
                                  </div>
                                </div>

                                <div
                                  class="col-12 row justify-end items-center q-mt-sm"
                                >
                                  <div>
                                    <div
                                      class="text-white row q-pl-sm q-py-xs br-8 q-mr-md"
                                      style="
                                        background-color: #5c6573 !important;
                                        padding-top: 5px;
                                        padding-bottom: 5px;
                                      "
                                    >
                                      <div
                                        class="text-bold q-ml-sm"
                                        style="font-size: 13px"
                                      >
                                        Css3
                                      </div>

                                      <q-icon
                                        size="20px"
                                        class="q-px-xs"
                                        color="grey-5"
                                        name="delete"
                                      />
                                    </div>
                                  </div>
                                </div>

                                <div
                                  class="col-12 row justify-end items-center q-mt-sm"
                                >
                                  <div>
                                    <div
                                      class="text-white row q-pl-sm q-py-xs br-8 q-mr-md"
                                      style="
                                        background-color: #5c6573 !important;
                                        padding-top: 5px;
                                        padding-bottom: 5px;
                                      "
                                    >
                                      <div
                                        class="text-bold q-ml-sm"
                                        style="font-size: 13px"
                                      >
                                        Figma
                                      </div>

                                      <q-icon
                                        size="20px"
                                        class="q-px-xs"
                                        color="grey-5"
                                        name="delete"
                                      />
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
                </div>
              </div>

              <!-- More -->

              <div class="q-mt-lg">
                <div class="full-width">
                  <div class="row">
                    <div class="col-12 row">
                      <div class="col-12 text-center q-my-md text-bold">
                        افزایش شانس استخدام شما تنها با تکمیل کردن اطلاعات
                        تکمیلی زیر
                      </div>

                      <!-- Content -->

                      <div class="full-width">
                        <div class="q-mt-sm">
                          <div class="bg-white br-10">
                            <!-- Partners -->

                            <div class="q-px-lg">
                              <div class="row">
                                <div class="col-12">
                                  <q-badge
                                    class="text-white text-bold"
                                    style="background-color: #45c26f"
                                  >
                                    100%
                                  </q-badge>
                                </div>

                                <div class="col-12 q-mt-md">
                                  <div class="col-12 row justify-between">
                                    <div class="text-h6 text-bold q-px-md">
                                      مدیران و همکاران سابق
                                    </div>

                                    <div>
                                      <q-btn
                                        dense
                                        flat
                                        color="primary"
                                        label="افزودن"
                                        icon="add_circle"
                                        class="q-pr-md"
                                      />
                                    </div>
                                  </div>
                                </div>

                                <div
                                  class="col-12 q-mt-sm q-mb-md row justify-center items-center q-ml-md"
                                >
                                  <q-item
                                    style="
                                      background-color: white;
                                      border-radius: 8px;
                                    "
                                    class="col-12 q-my-xs"
                                  >
                                    <q-item-section avatar>
                                      <div
                                        class="br-10 row q-py-sm"
                                        style="
                                          background-color: #f6f7f9 !important;
                                        "
                                      >
                                        <q-btn
                                          color="grey-7"
                                          flat
                                          dense
                                          class="col-12"
                                          icon="edit"
                                        />
                                        <q-btn
                                          color="grey-7"
                                          flat
                                          dense
                                          class="col-12"
                                          icon="delete "
                                        />
                                      </div>
                                    </q-item-section>

                                    <q-item-section class="q-px-md q-py-sm">
                                      <q-item-label class="text-bold"
                                        >عاشر قلیچ سید محمدی</q-item-label
                                      >

                                      <div class="q-my-sm">
                                        <span class="text-grey-7"
                                          >مدیر در aytronic</span
                                        >
                                      </div>

                                      <div class="text-grey-7">09112746075</div>
                                    </q-item-section>
                                  </q-item>
                                </div>
                              </div>
                            </div>

                            <q-separator class="full-width q-mt-md" />

                            <!-- Courses -->

                            <div class="col-12 row">
                              <div class="q-px-lg">
                                <div class="row">
                                  <div class="col-12">
                                    <q-badge
                                      class="text-white text-bold"
                                      style="background-color: #45c26f"
                                    >
                                      100%
                                    </q-badge>
                                  </div>

                                  <div class="col-12 q-mt-md">
                                    <div class="col-12 row justify-between">
                                      <div class="text-h6 text-bold q-px-md">
                                        دوره‌های آموزشی
                                      </div>

                                      <div>
                                        <q-btn
                                          dense
                                          flat
                                          color="primary"
                                          label="افزودن"
                                          icon="add_circle"
                                          class="q-pr-md"
                                        />
                                      </div>
                                    </div>
                                  </div>

                                  <div
                                    class="col-12 q-mt-sm q-mb-md row justify-center items-center q-ml-md"
                                  >
                                    <q-item class="col-12 q-my-xs">
                                      <q-item-section avatar>
                                        <div
                                          class="br-10 row q-py-lg"
                                          style="
                                            background-color: #f6f7f9 !important;
                                          "
                                        >
                                          <q-btn
                                            color="grey-7"
                                            flat
                                            dense
                                            class="col-12"
                                            icon="edit"
                                          />
                                          <q-btn
                                            color="grey-7"
                                            flat
                                            dense
                                            class="col-12"
                                            icon="delete "
                                          />
                                        </div>
                                      </q-item-section>

                                      <q-item-section class="q-pa-md">
                                        <q-item-label class="text-bold"
                                          >دوره نهم سفر به ماه</q-item-label
                                        >

                                        <div class="q-pt-md q-pb-sm">
                                          <span class="text-grey-7"
                                            >عاشر قلیچ سید محمدی</span
                                          >
                                        </div>

                                        <div class="text-grey-7 q-pb-sm">
                                          طول دوره: 1 سال
                                        </div>

                                        <div class="text-grey-7">1400</div>
                                      </q-item-section>

                                      <q-item-section
                                        class="q-pa-sm row q-mr-lg"
                                        side
                                      >
                                        <div class="text-bold text-black">
                                          The ninth period of travel to the moon
                                        </div>

                                        <div
                                          class="text-bold q-py-sm text-black"
                                        >
                                          Usher Qelich Seyed Muhammadi
                                        </div>

                                        <div class="text-grey-6 q-pb-sm">
                                          Duration: 1 year
                                        </div>

                                        <div class="text-grey-6">2021</div>
                                      </q-item-section>
                                    </q-item>
                                  </div>
                                </div>
                              </div>
                            </div>

                            <q-separator class="full-width q-mt-md" />

                            <!-- Awards -->

                            <div class="col-12 row">
                              <div class="q-px-lg">
                                <div class="row">
                                  <div class="col-12">
                                    <q-badge
                                      class="text-white text-bold"
                                      style="background-color: #45c26f"
                                    >
                                      100%
                                    </q-badge>
                                  </div>

                                  <div class="col-12 q-mt-md">
                                    <div class="col-12 row justify-between">
                                      <div class="text-h6 text-bold q-px-md">
                                        جوایز و افتخارات
                                      </div>

                                      <div>
                                        <q-btn
                                          dense
                                          flat
                                          color="primary"
                                          label="افزودن"
                                          icon="add_circle"
                                          class="q-pr-md"
                                        />
                                      </div>
                                    </div>
                                  </div>

                                  <div
                                    class="col-12 q-mt-sm q-mb-md row justify-center items-center q-ml-md"
                                  >
                                    <q-item class="col-12 q-my-xs">
                                      <q-item-section avatar>
                                        <div
                                          class="br-10 row q-py-sm"
                                          style="
                                            background-color: #f6f7f9 !important;
                                          "
                                        >
                                          <q-btn
                                            color="grey-7"
                                            flat
                                            dense
                                            class="col-12"
                                            icon="edit"
                                          />
                                          <q-btn
                                            color="grey-7"
                                            flat
                                            dense
                                            class="col-12"
                                            icon="delete "
                                          />
                                        </div>
                                      </q-item-section>

                                      <q-item-section class="q-pa-md">
                                        <div
                                          class="text-bold text-black row justify-between"
                                        >
                                          <span class="col">
                                            نفر اول کشوری جشنواره نوجوان خوارزمی
                                          </span>

                                          <span
                                            class="col"
                                            style="direction: ltr"
                                          >
                                            The first national winner of the
                                            Khwarazmi Youth Festival
                                          </span>
                                        </div>

                                        <div
                                          class="q-pt-md q-pb-sm text-grey-7 row justify-between"
                                        >
                                          <span>1401</span>
                                          <span>2022</span>
                                        </div>
                                      </q-item-section>
                                    </q-item>
                                  </div>
                                </div>
                              </div>
                            </div>

                            <q-separator class="full-width q-mt-md" />

                            <!-- Academic Projects  -->

                            <div class="q-px-lg q-mb-md">
                              <div class="col-12">
                                <q-badge
                                  class="text-white text-bold"
                                  style="background-color: #eb4969"
                                >
                                  0%
                                </q-badge>
                              </div>

                              <div class="col-12 row justify-between">
                                <div class="text-h6 text-bold q-px-md q-mt-sm">
                                  پروژه‌ها و تجربیات آکادمیک
                                </div>

                                <div>
                                  <q-btn
                                    dense
                                    flat
                                    color="primary"
                                    label="افزودن"
                                    icon="add_circle"
                                    class="q-pr-md"
                                  />
                                </div>
                              </div>
                            </div>

                            <q-separator class="full-width q-mt-md" />

                            <!-- Books And Articles -->

                            <div class="q-px-lg q-mb-md">
                              <div class="col-12">
                                <q-badge
                                  class="text-white text-bold"
                                  style="background-color: #eb4969"
                                >
                                  0%
                                </q-badge>
                              </div>

                              <div class="col-12 row justify-between">
                                <div class="text-h6 text-bold q-px-lg q-mt-sm">
                                  کتاب‌ها و مقالات
                                </div>

                                <div>
                                  <q-btn
                                    dense
                                    flat
                                    color="primary"
                                    label="افزودن"
                                    icon="add_circle"
                                    class="q-pr-md"
                                  />
                                </div>
                              </div>
                            </div>

                            <q-separator class="full-width q-mt-md" />

                            <!-- Voluntary Activities -->

                            <div class="q-px-lg q-pb-md">
                              <div class="col-12">
                                <q-badge
                                  class="text-white text-bold"
                                  style="background-color: #eb4969"
                                >
                                  0%
                                </q-badge>
                              </div>

                              <div class="col-12 row justify-between">
                                <div class="text-h6 text-bold q-px-md q-mt-sm">
                                  فعالیت‌های داوطلبانه
                                </div>

                                <div>
                                  <q-btn
                                    dense
                                    flat
                                    color="primary"
                                    label="افزودن"
                                    icon="add_circle"
                                    class="q-pr-md"
                                  />
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
            </div>

            <div class="col-4 q-pl-md">
              <div class="full-width q-px-md">
                <div class="bg-white br-10">
                  <div class="row justify-between q-pt-md q-pa-md">
                    <div class="col-12">
                      <div class="text-bold row">
                        <div>میزان تکمیل رزومه</div>
                        <div
                          class="text-weight-thin text-grey-7 q-pl-sm"
                          style="font-size: 12px"
                        >
                          آخرین به روزرسانی:
                          <span class="text-grey-9 text-bold"
                            >18 آبان 1402</span
                          >
                        </div>
                      </div>
                    </div>

                    <!-- Completion Rate -->

                    <div class="col-12">
                      <div class="row justify-between">
                        <div class="col-9 row items-center">
                          <q-circular-progress
                            show-value
                            value="100"
                            font-size="16px"
                            size="75px"
                            :thickness="0.1"
                            color="positive"
                            track-color="grey-5"
                            class="q-my-md q-mr-md q-ml-sm text-bold text-positive"
                          >
                            100%
                          </q-circular-progress>

                          <div class="q-ml-xs">
                            <div class="q-mb-sm">رزومه فارسی</div>
                            <div class="text-positive">تکمیل شده</div>
                          </div>
                        </div>

                        <q-btn
                          class="col-3"
                          flat
                          dense
                          color="primary"
                          icon="upload"
                        />
                      </div>

                      <div class="row justify-between">
                        <div class="col-9 row items-center">
                          <q-circular-progress
                            show-value
                            value="100"
                            font-size="16px"
                            size="75px"
                            :thickness="0.1"
                            color="positive"
                            track-color="grey-5"
                            class="q-my-md q-mr-md q-ml-sm text-bold text-positive"
                          >
                            100%
                          </q-circular-progress>

                          <div class="q-ml-xs">
                            <div class="q-mb-sm">رزومه انگلیسی</div>
                            <div class="text-positive">تکمیل شده</div>
                          </div>
                        </div>

                        <q-btn
                          class="col-3"
                          flat
                          dense
                          color="primary"
                          icon="upload"
                        />
                      </div>

                      <!-- Sections -->

                      <div class="q-pb-md">
                        <div class="text-bold q-mb-sm">
                          افزودن بخش های تکمیلی
                        </div>
                        <div class="row">
                          <q-btn
                            flat
                            color="primary"
                            label="کتاب‌ها و مقالات"
                          />
                          <q-separator vertical inset />
                          <q-btn
                            flat
                            color="primary"
                            label="پروژه‌ها و تجربیات آکادمیک"
                          />
                          <q-separator vertical inset />
                          <q-btn flat color="primary" label="+ 4 مورد دیگر" />
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Phone Number, Audio Introduction And Upload Personal Resume -->

              <div class="q-mt-lg">
                <div class="bg-white br-10">
                  <div class="row">
                    <!-- First Part -->

                    <div class="q-pa-md">
                      <div class="text-bold text-h6">اطلاعات تماس</div>

                      <div class="row full-width q-mt-md">
                        <div class="col-12">
                          <div class="row justify-between">
                            <div class="col-8">
                              <div class="text-weight-thin text-grey-6">
                                آدرس ایمیل
                              </div>
                              <div class="text-bold">
                                moeensedaghaty86@gmail.com
                              </div>
                            </div>

                            <div class="col-2">
                              <q-btn flat color="grey-9" icon="edit" />
                            </div>
                          </div>
                        </div>

                        <div class="col-12 q-mt-md">
                          <div class="row justify-between">
                            <div class="col-8">
                              <div class="text-weight-thin text-grey-6">
                                شماره موبایل
                              </div>
                              <div class="text-bold">09379608155</div>
                            </div>

                            <div class="col-2">
                              <q-btn flat color="grey-9" icon="edit" />
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>

                    <q-separator
                      class="q-mt-md full-width"
                      style="height: 1px"
                    />

                    <div class="full-width">
                      <div class="bg-white br-10">
                        <div class="q-px-md">
                          <div class="row">
                            <div class="col-12">
                              <q-badge
                                class="text-white text-bold"
                                style="background-color: #eb4969"
                              >
                                0%
                              </q-badge>
                            </div>
                          </div>

                          <div class="full-width row justify-center q-py-md">
                            <div class="col-12 row justify-between">
                              <div class="text-h6 text-bold q-mt-sm">
                                معرفی صوتی
                              </div>

                              <div>
                                <q-btn
                                  dense
                                  flat
                                  color="primary"
                                  label="افزودن"
                                  icon="add_circle"
                                  class="q-pr-md"
                                />
                              </div>
                            </div>

                            <div class="col-12 q-mt-md">
                              <div class="text-grey-7">
                                در این بخش، خود را در قالب یک صوت حداکثر دو
                                دقیقه ای به کارفرما معرفی کنید. در بسیاری از
                                موارد شناختی که این معرفی دو دقیقه ای برای
                                کارفرمایان ایجاد میکند
                                <span class="text-bold text-grey-8"
                                  >از رزومه شما بیشتر است.</span
                                >
                              </div>
                            </div>

                            <q-btn
                              class="q-mt-md text-primary"
                              style="font-size: 18px"
                              flat
                            >
                              <q-icon
                                style="border-radius: 50%"
                                class="text-white bg-primary q-pa-sm q-mr-md"
                                size="32px"
                                name="mic"
                              />

                              ضبط صدا
                            </q-btn>
                          </div>
                        </div>
                      </div>
                    </div>

                    <!-- Second Part -->

                    <q-separator
                      class="q-mt-md full-width"
                      style="height: 1px"
                    />

                    <div class="full-width">
                      <div class="bg-white br-10">
                        <div class="q-px-md">
                          <div class="row">
                            <div class="col-12">
                              <q-badge
                                class="text-white text-bold"
                                style="background-color: #eb4969"
                              >
                                0%
                              </q-badge>
                            </div>
                          </div>

                          <div class="full-width row justify-center q-py-md">
                            <div class="col-12 row justify-between">
                              <div class="text-h6 text-bold q-mt-sm">
                                بارگذاری رزومه شخصی
                              </div>

                              <div>
                                <q-btn
                                  dense
                                  flat
                                  color="primary"
                                  label="افزودن"
                                  icon="add_circle"
                                  class="q-pr-md"
                                />
                              </div>
                            </div>

                            <div class="col-12 q-mt-md">
                              <div class="text-grey-7">
                                در این بخش با بارگذاری فایل رزومه خود نیز
                                می‌توانید به جذب بهتر خود کمک کنید. ایجاد میکند
                              </div>
                            </div>

                            <q-img
                              class="col-8 q-mt-md"
                              src="https://jobvision.ir/assets/images/my-cv/cv-sample.svg"
                            />
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Some Of My Works -->

              <div class="q-mt-lg">
                <div class="bg-white br-10">
                  <div class="row">
                    <div class="full-width">
                      <div class="bg-white br-10">
                        <div class="q-px-md">
                          <div class="row">
                            <div class="col-12">
                              <q-badge
                                class="text-white text-bold"
                                style="background-color: #45c26f"
                              >
                                100%
                              </q-badge>
                            </div>
                          </div>

                          <!-- Declaration -->

                          <div class="full-width">
                            <div class="row justify-between">
                              <div class="text-h6 text-bold q-mt-sm">
                                نمونه کارها
                              </div>

                              <div>
                                <q-btn
                                  dense
                                  flat
                                  color="primary"
                                  label="افزودن"
                                  icon="add_circle"
                                  class="q-pr-md"
                                />
                              </div>
                            </div>

                            <!-- Buttons And Links -->

                            <div class="row q-my-lg">
                              <div class="full-width">
                                <div
                                  dir="ltr"
                                  class="row justify-between q-pr-md"
                                >
                                  <div class="col-7 row">
                                    <q-btn
                                      class="col-2"
                                      color="primary"
                                      rounded
                                      icon="link"
                                      unelevated
                                    />

                                    <div class="text-primary col-6">
                                      <q-btn
                                        flat
                                        href="https://moeensedaqati.ir/"
                                        target="_blank"
                                      >
                                        <div style="font-size: 12px">
                                          https://moeensedaqati.ir/
                                        </div>
                                      </q-btn>
                                    </div>
                                  </div>

                                  <div class="col-5 row justify-end">
                                    <q-btn
                                      class="q-px-s"
                                      dense
                                      flat
                                      color="grey-8"
                                      icon="edit"
                                    />
                                    <q-btn
                                      class="q-px-s"
                                      dense
                                      flat
                                      color="grey-8"
                                      icon="delete"
                                    />
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
              </div>

              <!-- Salary Insight -->

              <div class="q-mt-lg">
                <div class="bg-white br-10">
                  <div class="row">
                    <div class="full-width">
                      <div
                        style="background-color: #eeeffe !important"
                        class="br-10 q-py-md"
                      >
                        <div class="q-px-md row">
                          <div class="full-width">
                            <div class="row justify-center text-center">
                              <q-img
                                class="col-8"
                                src="https://jobvision.ir/assets/images/my-cv/salary-table.svg"
                              />

                              <div>
                                <div
                                  class="text-bold q-mt-md"
                                  style="font-size: 12px"
                                >
                                  از حقوق دریافتی افراد در مشاغل مختلف باخبر
                                  شوید
                                </div>

                                <div class="q-mt-sm" style="font-size: 11px">
                                  حقوق و دستمزد مشاغل مختلف را بررسی کنید و
                                  تخمین دقیق‌تری از حقوق منصفانه خود داشته
                                  باشید.
                                </div>

                                <div class="q-mt-md">
                                  <q-btn
                                    flat
                                    color="primary"
                                    class="text-bold"
                                    label="ماشین حساب حقوق و دست مزد"
                                    icon-right="west"
                                  />
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

              <!-- Test Results -->

              <div class="q-mt-lg">
                <div class="bg-white br-10">
                  <div class="row q-py-md">
                    <div class="full-width">
                      <div class="bg-white br-10">
                        <div class="q-px-md">
                          <!-- Declaration -->

                          <div class="full-width">
                            <div class="row justify-between">
                              <div class="text-h6 text-bold q-mt-sm">
                                نتایج آزمون‌ها
                              </div>
                            </div>
                          </div>

                          <div class="full-width q-mt-lg">
                            <div class="row justify-center">
                              <div class="col-12 row justify-between">
                                <div class="col-7 text-grey-7">
                                  <q-btn
                                    rounded
                                    disable
                                    dense
                                    color="grey-5"
                                    icon="done"
                                    class="q-mr-sm"
                                  />
                                  <span>Bar-On </span>
                                </div>

                                <div class="col-5 row justify-end">
                                  <q-btn
                                    flat
                                    color="primary"
                                    label="شرکت در آزمون"
                                  />
                                </div>
                              </div>

                              <div class="col-12 row justify-between q-mt-xs">
                                <div class="col-7 text-bold">
                                  <q-btn
                                    rounded
                                    disable
                                    dense
                                    color="primary"
                                    icon="done"
                                    class="q-mr-sm"
                                  />
                                  <span>MBTI </span>
                                </div>

                                <div class="col-5 row justify-end">
                                  <q-btn
                                    flat
                                    color="primary"
                                    label="مشاهده نتایج"
                                  />
                                </div>
                              </div>

                              <div class="col-12 row justify-between q-mt-xs">
                                <div class="col-7 text-grey-7">
                                  <q-btn
                                    rounded
                                    disable
                                    dense
                                    color="grey-5"
                                    icon="done"
                                    class="q-mr-sm"
                                  />
                                  <span>NEO </span>
                                </div>

                                <div class="col-5 row justify-end">
                                  <q-btn
                                    flat
                                    color="primary"
                                    label="شرکت در آزمون"
                                  />
                                </div>
                              </div>

                              <div class="col-12 row justify-between q-mt-xs">
                                <div class="col-7 text-grey-7">
                                  <q-btn
                                    rounded
                                    disable
                                    dense
                                    color="grey-5"
                                    icon="done"
                                    class="q-mr-sm"
                                  />
                                  <span>هوش های چندگانه</span>
                                </div>

                                <div class="col-5 row justify-end">
                                  <q-btn
                                    flat
                                    color="primary"
                                    label="شرکت در آزمون"
                                  />
                                </div>
                              </div>

                              <div class="col-12 row justify-between q-mt-xs">
                                <div class="col-7 text-grey-7">
                                  <q-btn
                                    rounded
                                    disable
                                    dense
                                    color="grey-5"
                                    icon="done"
                                    class="q-mr-sm"
                                  />
                                  <span>Holland </span>
                                </div>

                                <div class="col-5 row justify-end">
                                  <q-btn
                                    flat
                                    color="primary"
                                    label="شرکت در آزمون"
                                  />
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
            </div>
          </div>

          <div class="row" v-if="preferred == 'کارفرما'">
            <!-- Employer -->

            <div class="col-8 q-pr-md">
              <div class="full-width">
                <div class="bg-white br-10">
                  <div class="q-px-lg">
                    <div class="row">
                      <div class="col-12">
                        <q-badge
                          class="text-white text-bold"
                          style="background-color: #45c26f"
                        >
                          100%
                        </q-badge>
                      </div>
                    </div>

                    <div class="full-width">
                      <div class="row justify-between">
                        <div class="text-h6 text-bold q-mt-sm">درباره من</div>
                      </div>
                    </div>

                    <div class="col-12 row">
                      <div class="q-mt-md q-mb-lg row justify-between">
                        <div class="col-12 q-pr-xl">
                          <q-item class="full-width">
                            <q-item-section top avatar>
                              <q-avatar
                                size="64px"
                                color="blue-grey-3"
                                text-color="white"
                                @click="editToggle"
                              >
                                <q-icon size="80px" name="person" />
                              </q-avatar>
                            </q-item-section>

                            <q-item-section class="q-px-md">
                              <q-item-label
                                style="font-size: 16px"
                                class="text-bold"
                                >معین صداقتی</q-item-label
                              >
                              <q-item-label class="q-pt-md" caption lines="2">
                                دولوپر فول استک در شرکت آیترونیک
                              </q-item-label>
                            </q-item-section>
                          </q-item>
                        </div>

                        <div class="row q-px-md">
                          <div class="col-12 q-mt-md text-grey-8">
                            معین صداقتی متولد سال 1386/9/9. از 13 سالگی شروع به
                            یاد گیری برنامه نویسی کردم و از 15 سالگی به صورت جدی
                            برنامه نویسی میکنم.
                          </div>

                          <div dir="ltr" class="col-12 q-mt-lg text-grey-8">
                            Moeen Sedaqati born on 9/9/1386. I started learning
                            programming when I was 13 years old, and I started
                            programming seriously when I was 15 years old.
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="q-mt-lg">
                <div class="full-width">
                  <div class="bg-white br-10">
                    <div class="q-px-lg">
                      <div class="row">
                        <div class="col-12">
                          <q-badge
                            class="text-white text-bold"
                            style="background-color: #45c26f"
                          >
                            100%
                          </q-badge>
                        </div>

                        <div class="full-width">
                          <div class="row justify-between">
                            <div class="text-h6 text-bold q-mt-sm">
                              اطلاعات اولیه
                            </div>
                          </div>
                        </div>

                        <div class="row justify-between q-mt-lg full-width">
                          <div class="col-12 row justify-between q-pb-lg">
                            <div class="col-5">
                              <div>
                                <div class="text-weight-thin text-grey-8">
                                  نام و نام خانوادگی
                                </div>
                                <div class="text-bold">معین صداقتی</div>
                              </div>

                              <div class="q-mt-md">
                                <div class="text-weight-thin text-grey-8">
                                  جنسیت
                                </div>
                                <div class="text-bold">مرد</div>
                              </div>

                              <div class="q-mt-md">
                                <div class="text-weight-thin text-grey-8">
                                  وضعیت تاهل
                                </div>
                                <div class="text-bold">مجرد</div>
                              </div>

                              <div class="q-mt-md">
                                <div class="text-weight-thin text-grey-8">
                                  وضعیت نظام وظیفه
                                </div>
                                <div class="text-bold">معافیت تحصیلی</div>
                              </div>

                              <div class="q-mt-md">
                                <div class="text-weight-thin text-grey-8">
                                  شهر محل سکونت
                                </div>
                                <div class="text-bold">گنبد کاووس</div>
                              </div>

                              <div class="q-mt-md">
                                <div class="text-weight-thin text-grey-8">
                                  محل سکونت
                                </div>
                                <div class="text-bold">
                                  خیابان بعثت غربی نرسیده به چهارراه فردوسی جنب
                                  یخچال سازی صوفی زاده
                                </div>
                              </div>

                              <div class="q-mt-md">
                                <div class="text-weight-thin text-grey-8">
                                  تاریخ تولد
                                </div>
                                <div class="text-bold">1386/09/09</div>
                              </div>

                              <div class="q-mt-md">
                                <div class="text-weight-thin text-grey-8">
                                  شماره ثابت
                                </div>
                                <div class="text-bold">33231884</div>
                              </div>

                              <div class="q-mt-md">
                                <div class="text-weight-thin text-grey-8">
                                  حقوق درخواستی
                                </div>
                                <div class="text-bold">8 - 6 میلیون تومان</div>
                              </div>

                              <div class="q-mt-md">
                                <div class="text-weight-thin text-grey-8">
                                  گروه شغلی مورد علاقه
                                </div>
                                <div class="text-bold">
                                  توسعه نرم افزار و برنامه نویسی
                                </div>
                              </div>
                            </div>

                            <div dir="ltr" class="col-5">
                              <div>
                                <div class="text-weight-thin text-grey-8">
                                  First and Last Name
                                </div>
                                <div class="text-bold">Moeen Sedaqati</div>
                              </div>

                              <div class="q-mt-md">
                                <div class="text-weight-thin text-grey-8">
                                  Gender
                                </div>
                                <div class="text-bold">Male</div>
                              </div>

                              <div class="q-mt-md">
                                <div class="text-weight-thin text-grey-8">
                                  Marital Status
                                </div>
                                <div class="text-bold">Single</div>
                              </div>

                              <div class="q-mt-md">
                                <div class="text-weight-thin text-grey-8">
                                  Military Service Status
                                </div>
                                <div class="text-bold">
                                  Educational Exemption
                                </div>
                              </div>

                              <div class="q-mt-md">
                                <div class="text-weight-thin text-grey-8">
                                  City
                                </div>
                                <div class="text-bold">Gonbad kavoos</div>
                              </div>

                              <div class="q-mt-md">
                                <div class="text-weight-thin text-grey-8">
                                  Region
                                </div>
                                <div class="text-bold">
                                  West Ba'ath St. has not reached the Ferdowsi
                                  intersection, next to Sufizadeh refrigerator
                                </div>
                              </div>

                              <div class="q-mt-md">
                                <div class="text-weight-thin text-grey-8">
                                  Date of Birth
                                </div>
                                <div class="text-bold">2007-11-30</div>
                              </div>

                              <div class="q-mt-md">
                                <div class="text-weight-thin text-grey-8">
                                  Phone Number
                                </div>
                                <div class="text-bold">33231884</div>
                              </div>

                              <div class="q-mt-md">
                                <div class="text-weight-thin text-grey-8">
                                  Expected Salary
                                </div>
                                <div class="text-bold">
                                  6 - 8 Million Tomans
                                </div>
                              </div>

                              <div class="q-mt-md">
                                <div class="text-weight-thin text-grey-8">
                                  Preferred Job Category
                                </div>
                                <div class="text-bold">
                                  IT - Software Development (Web,Moblie,…)
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

              <!-- Educational Records -->

              <div class="q-mt-lg">
                <div class="full-width">
                  <div class="bg-white br-10">
                    <div class="q-px-lg">
                      <div class="row">
                        <div class="col-12">
                          <q-badge
                            class="text-white text-bold"
                            style="background-color: #45c26f"
                          >
                            100%
                          </q-badge>
                        </div>

                        <div class="col-12 q-mt-md">
                          <div class="col-12 row justify-between">
                            <div class="text-h6 text-bold q-mt-sm">
                              سوابق تحصیلی
                            </div>

                            <!-- <div>
                            <q-btn
                              dense
                              flat
                              color="primary"
                              label="افزودن"
                              icon="add_circle"
                              class="q-pr-md"
                            />
                          </div> -->
                          </div>
                        </div>

                        <div class="col-12 q-mt-md q-mb-sm">
                          <q-checkbox v-model="val" label="تحصیلات دانشگاهی" />
                        </div>

                        <div class="col-12 q-mb-md q-ml-md">
                          <q-radio
                            class="q-mb-xs full-width"
                            v-model="shape"
                            val="DY"
                            label="مدرک تحصیلی دیپلم دارم."
                          />
                          <q-radio
                            class="q-my-xs full-width"
                            v-model="shape"
                            val="DN"
                            label="مدرک تحصیلی زیر دیپلم دارم."
                          />
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Experience -->

              <div class="q-mt-lg">
                <div class="full-width">
                  <div class="bg-white br-10">
                    <div class="q-px-lg">
                      <div class="row">
                        <div class="col-12">
                          <q-badge
                            class="text-white text-bold"
                            style="background-color: #45c26f"
                          >
                            100%
                          </q-badge>
                        </div>

                        <div class="col-12 q-mt-md">
                          <div class="col-12 row justify-between">
                            <div class="text-h6 text-bold q-mt-sm">
                              سوابق شغلی
                            </div>
                          </div>
                        </div>

                        <div
                          class="col-12 q-mt-xs q-mb-md row justify-center items-center"
                        >
                          <q-item
                            style="background-color: white; border-radius: 8px"
                            class="col-12 q-my-xs"
                          >
                            <q-item-section class="q-pa-md">
                              <q-item-label class="text-bold"
                                >دولوپر فول استک در شرکت آیترونیک</q-item-label
                              >

                              <div class="q-my-md">
                                <span class="text-bold">آیترونیک</span>
                              </div>

                              <div class="text-grey-6">از تیر 1402 تاکنون</div>
                            </q-item-section>

                            <q-item-section class="q-pa-sm row q-mr-md" side>
                              <div class="text-bold text-black">
                                Full Stack Developer
                              </div>

                              <div class="text-bold q-my-md text-black">
                                Aytronic
                              </div>

                              <div class="text-grey-6">June 2023 - Present</div>
                            </q-item-section>
                          </q-item>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Langs -->

              <div class="q-mt-lg">
                <div class="full-width">
                  <div class="bg-white br-10">
                    <div class="q-px-lg">
                      <div class="row">
                        <div class="col-12">
                          <q-badge
                            class="text-white text-bold"
                            style="background-color: #45c26f"
                          >
                            100%
                          </q-badge>
                        </div>

                        <div class="col-12 q-mt-md">
                          <div class="col-12 row justify-between">
                            <div class="text-h6 text-bold q-mt-sm">زبان‌ها</div>
                          </div>
                        </div>

                        <div class="col-12 row justify-between q-my-md">
                          <div class="col-5 row q-mr-md">
                            <div>
                              <div class="row items-center q-mt-md">
                                <div
                                  class="text-white row q-px-sm q-py-xs br-10"
                                  style="
                                    background-color: #5c6573 !important;
                                    padding-top: 5px;
                                    padding-bottom: 5px;
                                  "
                                >
                                  <div class="text-bold q-ml-sm">انگلیسی</div>

                                  <q-separator
                                    color="white"
                                    class="q-mx-sm q-my-xs"
                                    vertical
                                  />

                                  <div>Upper Intermediate</div>
                                </div>
                              </div>
                            </div>

                            <div>
                              <div class="row items-center q-mt-md">
                                <div
                                  class="text-white row q-px-sm q-py-xs br-10"
                                  style="
                                    background-color: #5c6573 !important;
                                    padding-top: 5px;
                                    padding-bottom: 5px;
                                  "
                                >
                                  <div class="text-bold q-ml-sm">فارسی</div>

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

                          <div class="col-5 row justify-end q-mr-md">
                            <div>
                              <div class="row items-center q-mt-md">
                                <div
                                  class="text-white row q-px-sm q-py-xs br-10"
                                  style="
                                    background-color: #5c6573 !important;
                                    padding-top: 5px;
                                    padding-bottom: 5px;
                                  "
                                >
                                  <div>Upper Intermediate</div>

                                  <q-separator
                                    color="white"
                                    class="q-mx-sm q-my-xs"
                                    vertical
                                  />

                                  <div class="text-bold q-ml-sm">English</div>
                                </div>
                              </div>
                            </div>

                            <div>
                              <div class="row items-center q-mt-md">
                                <div
                                  class="text-white row q-px-sm q-py-xs br-10"
                                  style="
                                    background-color: #5c6573 !important;
                                    padding-top: 5px;
                                    padding-bottom: 5px;
                                  "
                                >
                                  <div>Advanced</div>

                                  <q-separator
                                    color="white"
                                    class="q-mx-sm q-my-xs"
                                    vertical
                                  />

                                  <div class="text-bold q-ml-sm">Persian</div>
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

              <!-- Skills -->

              <div class="q-mt-lg">
                <div class="full-width">
                  <div class="bg-white br-10">
                    <div class="q-px-lg">
                      <div class="row">
                        <div class="col-12">
                          <q-badge
                            class="text-white text-bold"
                            style="background-color: #45c26f"
                          >
                            100%
                          </q-badge>
                        </div>

                        <div class="col-12 q-mt-md">
                          <div class="col-12 row justify-between">
                            <div class="text-h6 text-bold q-mt-sm">
                              مهارت های نرم افزاری
                            </div>
                          </div>
                        </div>

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
                                <div
                                  class="text-bold q-ml-sm"
                                  style="font-size: 13px"
                                >
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
                                <div
                                  class="text-bold q-ml-sm"
                                  style="font-size: 13px"
                                >
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
                                <div
                                  class="text-bold q-ml-sm"
                                  style="font-size: 13px"
                                >
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
                    </div>
                  </div>
                </div>
              </div>

              <!-- Additional Skills -->

              <div class="q-mt-lg">
                <div class="full-width">
                  <div class="bg-white br-10">
                    <div class="q-px-lg">
                      <div class="row">
                        <div class="col-12">
                          <q-badge
                            class="text-white text-bold"
                            style="background-color: #45c26f"
                          >
                            100%
                          </q-badge>
                        </div>

                        <div class="col-12 q-mt-md">
                          <div class="col-12 row justify-between">
                            <div class="text-h6 text-bold q-mt-sm">
                              مهارت های تکمیلی
                            </div>
                          </div>
                        </div>

                        <div class="full-width">
                          <div class="q-my-lg">
                            <div class="row">
                              <div class="col">
                                <div class="col-12 row items-center q-mt-sm">
                                  <div>
                                    <div
                                      class="text-white row q-px-sm q-pb-xs"
                                      style="
                                        padding-top: 5px;
                                        padding-bottom: 5px;
                                      "
                                    >
                                      <div
                                        class="text-grey-6"
                                        style="font-size: 13px"
                                      >
                                        مهارت‌ها در رزومه فارسی (6 مهارت)
                                      </div>
                                    </div>
                                  </div>
                                </div>

                                <!-- Skills -->

                                <div class="col-12 row items-center q-mt-sm">
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

                                      <div
                                        class="text-bold q-ml-sm"
                                        style="font-size: 13px"
                                      >
                                        برنامه نویسی فرانت اند
                                      </div>
                                    </div>
                                  </div>
                                </div>

                                <div class="col-12 row items-center q-mt-sm">
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

                                      <div
                                        class="text-bold q-ml-sm"
                                        style="font-size: 13px"
                                      >
                                        سی اس اس
                                      </div>
                                    </div>
                                  </div>
                                </div>

                                <div class="col-12 row items-center q-mt-sm">
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

                                      <div
                                        class="text-bold q-ml-sm"
                                        style="font-size: 13px"
                                      >
                                        فیگما
                                      </div>
                                    </div>
                                  </div>
                                </div>

                                <div class="col-12 row items-center q-mt-sm">
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

                                      <div
                                        class="text-bold q-ml-sm"
                                        style="font-size: 13px"
                                      >
                                        اچ تی ام ال
                                      </div>
                                    </div>
                                  </div>
                                </div>

                                <div class="col-12 row items-center q-mt-sm">
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

                                      <div
                                        class="text-bold q-ml-sm"
                                        style="font-size: 13px"
                                      >
                                        کویزار
                                      </div>
                                    </div>
                                  </div>
                                </div>

                                <div class="col-12 row items-center q-mt-sm">
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

                                      <div
                                        class="text-bold q-ml-sm"
                                        style="font-size: 13px"
                                      >
                                        لاراول
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>

                              <q-separator class="q-my-xs q-mx-xs" vertical />

                              <div class="col row">
                                <div
                                  class="col-12 row justify-end items-center q-mt-sm"
                                >
                                  <div>
                                    <div
                                      class="text-white row q-px-sm q-pb-xs q-mr-sm"
                                      style="
                                        padding-top: 5px;
                                        padding-bottom: 5px;
                                      "
                                    >
                                      <div
                                        class="text-grey-6"
                                        style="font-size: 13px"
                                      >
                                        Skills in English Resume (8 skills)
                                      </div>
                                    </div>
                                  </div>
                                </div>

                                <!-- Skills -->

                                <div
                                  class="col-12 row justify-end items-center q-mt-sm"
                                >
                                  <div>
                                    <div
                                      class="text-white row q-pl-sm q-py-xs br-8 q-mr-md"
                                      style="
                                        background-color: #5c6573 !important;
                                        padding-top: 5px;
                                        padding-bottom: 5px;
                                      "
                                    >
                                      <div
                                        class="text-bold q-mr-sm"
                                        style="font-size: 13px"
                                      >
                                        HTML
                                      </div>

                                      <q-icon
                                        size="20px"
                                        class="q-px-xs"
                                        color="grey-5"
                                        name="delete"
                                      />
                                    </div>
                                  </div>
                                </div>

                                <div
                                  class="col-12 row justify-end items-center q-mt-sm"
                                >
                                  <div>
                                    <div
                                      class="text-white row q-pl-sm q-py-xs br-8 q-mr-md"
                                      style="
                                        background-color: #5c6573 !important;
                                        padding-top: 5px;
                                        padding-bottom: 5px;
                                      "
                                    >
                                      <div
                                        class="text-bold q-ml-sm"
                                        style="font-size: 13px"
                                      >
                                        Quasar
                                      </div>

                                      <q-icon
                                        size="20px"
                                        class="q-px-xs"
                                        color="grey-5"
                                        name="delete"
                                      />
                                    </div>
                                  </div>
                                </div>

                                <div
                                  class="col-12 row justify-end items-center q-mt-sm"
                                >
                                  <div>
                                    <div
                                      class="text-white row q-pl-sm q-py-xs br-8 q-mr-md"
                                      style="
                                        background-color: #5c6573 !important;
                                        padding-top: 5px;
                                        padding-bottom: 5px;
                                      "
                                    >
                                      <div
                                        class="text-bold q-ml-sm"
                                        style="font-size: 13px"
                                      >
                                        vue.js
                                      </div>

                                      <q-icon
                                        size="20px"
                                        class="q-px-xs"
                                        color="grey-5"
                                        name="delete"
                                      />
                                    </div>
                                  </div>
                                </div>

                                <div
                                  class="col-12 row justify-end items-center q-mt-sm"
                                >
                                  <div>
                                    <div
                                      class="text-white row q-pl-sm q-py-xs br-8 q-mr-md"
                                      style="
                                        background-color: #5c6573 !important;
                                        padding-top: 5px;
                                        padding-bottom: 5px;
                                      "
                                    >
                                      <div
                                        class="text-bold q-ml-sm"
                                        style="font-size: 13px"
                                      >
                                        vue router
                                      </div>

                                      <q-icon
                                        size="20px"
                                        class="q-px-xs"
                                        color="grey-5"
                                        name="delete"
                                      />
                                    </div>
                                  </div>
                                </div>

                                <div
                                  class="col-12 row justify-end items-center q-mt-sm"
                                >
                                  <div>
                                    <div
                                      class="text-white row q-pl-sm q-py-xs br-8 q-mr-md"
                                      style="
                                        background-color: #5c6573 !important;
                                        padding-top: 5px;
                                        padding-bottom: 5px;
                                      "
                                    >
                                      <div
                                        class="text-bold q-ml-sm"
                                        style="font-size: 13px"
                                      >
                                        Vue CLi
                                      </div>

                                      <q-icon
                                        size="20px"
                                        class="q-px-xs"
                                        color="grey-5"
                                        name="delete"
                                      />
                                    </div>
                                  </div>
                                </div>

                                <div
                                  class="col-12 row justify-end items-center q-mt-sm"
                                >
                                  <div>
                                    <div
                                      class="text-white row q-pl-sm q-py-xs br-8 q-mr-md"
                                      style="
                                        background-color: #5c6573 !important;
                                        padding-top: 5px;
                                        padding-bottom: 5px;
                                      "
                                    >
                                      <div
                                        class="text-bold q-ml-sm"
                                        style="font-size: 13px"
                                      >
                                        Laravel
                                      </div>

                                      <q-icon
                                        size="20px"
                                        class="q-px-xs"
                                        color="grey-5"
                                        name="delete"
                                      />
                                    </div>
                                  </div>
                                </div>

                                <div
                                  class="col-12 row justify-end items-center q-mt-sm"
                                >
                                  <div>
                                    <div
                                      class="text-white row q-pl-sm q-py-xs br-8 q-mr-md"
                                      style="
                                        background-color: #5c6573 !important;
                                        padding-top: 5px;
                                        padding-bottom: 5px;
                                      "
                                    >
                                      <div
                                        class="text-bold q-ml-sm"
                                        style="font-size: 13px"
                                      >
                                        Css3
                                      </div>

                                      <q-icon
                                        size="20px"
                                        class="q-px-xs"
                                        color="grey-5"
                                        name="delete"
                                      />
                                    </div>
                                  </div>
                                </div>

                                <div
                                  class="col-12 row justify-end items-center q-mt-sm"
                                >
                                  <div>
                                    <div
                                      class="text-white row q-pl-sm q-py-xs br-8 q-mr-md"
                                      style="
                                        background-color: #5c6573 !important;
                                        padding-top: 5px;
                                        padding-bottom: 5px;
                                      "
                                    >
                                      <div
                                        class="text-bold q-ml-sm"
                                        style="font-size: 13px"
                                      >
                                        Figma
                                      </div>

                                      <q-icon
                                        size="20px"
                                        class="q-px-xs"
                                        color="grey-5"
                                        name="delete"
                                      />
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
                </div>
              </div>

              <!-- More -->

              <div class="q-mt-lg">
                <div class="full-width">
                  <div class="row">
                    <!-- Partners -->

                    <div class="col-12 row">
                      <!-- Content -->

                      <div class="col-12 q-mt-md">
                        <div class="q-mt-sm">
                          <div class="bg-white br-10">
                            <div class="q-px-lg">
                              <div class="row">
                                <div class="col-12">
                                  <q-badge
                                    class="text-white text-bold"
                                    style="background-color: #45c26f"
                                  >
                                    100%
                                  </q-badge>
                                </div>

                                <div class="col-12 q-mt-md">
                                  <div class="col-12 row justify-between">
                                    <div class="text-h6 text-bold q-px-md">
                                      مدیران و همکاران سابق
                                    </div>
                                  </div>
                                </div>

                                <div
                                  class="col-12 q-mt-sm q-mb-md row justify-center items-center q-ml-md"
                                >
                                  <q-item
                                    style="
                                      background-color: white;
                                      border-radius: 8px;
                                    "
                                    class="col-12 q-my-xs"
                                  >
                                    <q-item-section class="q-px-md q-py-sm">
                                      <q-item-label class="text-bold"
                                        >عاشر قلیچ سید محمدی</q-item-label
                                      >

                                      <div class="q-my-sm">
                                        <span class="text-grey-7"
                                          >مدیر در aytronic</span
                                        >
                                      </div>

                                      <div class="text-grey-7">09112746075</div>
                                    </q-item-section>
                                  </q-item>
                                </div>
                              </div>
                            </div>

                            <q-separator class="full-width q-mt-md" />

                            <!-- Courses -->

                            <div class="col-12">
                              <div class="q-px-lg">
                                <div class="row">
                                  <div class="col-12">
                                    <q-badge
                                      class="text-white text-bold"
                                      style="background-color: #45c26f"
                                    >
                                      100%
                                    </q-badge>
                                  </div>

                                  <div class="col-12 q-mt-md">
                                    <div class="col-12 row justify-between">
                                      <div class="text-h6 text-bold q-px-md">
                                        دوره‌های آموزشی
                                      </div>
                                    </div>
                                  </div>

                                  <div
                                    class="col-12 q-mt-sm q-mb-md row justify-center items-center q-ml-md"
                                  >
                                    <q-item class="col-12 q-my-xs">
                                      <q-item-section class="q-pa-md">
                                        <q-item-label class="text-bold"
                                          >دوره نهم سفر به ماه</q-item-label
                                        >

                                        <div class="q-pt-md q-pb-sm">
                                          <span class="text-grey-7"
                                            >عاشر قلیچ سید محمدی</span
                                          >
                                        </div>

                                        <div class="text-grey-7 q-pb-sm">
                                          طول دوره: 1 سال
                                        </div>

                                        <div class="text-grey-7">1400</div>
                                      </q-item-section>

                                      <q-item-section
                                        class="q-pa-sm row q-mr-md"
                                        side
                                      >
                                        <div class="text-bold text-black">
                                          The ninth period of travel to the moon
                                        </div>

                                        <div
                                          class="text-bold q-py-sm text-black"
                                        >
                                          Usher Qelich Seyed Muhammadi
                                        </div>

                                        <div class="text-grey-6 q-pb-sm">
                                          Duration: 1 year
                                        </div>

                                        <div class="text-grey-6">2021</div>
                                      </q-item-section>
                                    </q-item>
                                  </div>
                                </div>
                              </div>
                            </div>

                            <q-separator class="full-width q-mt-md" />

                            <!-- Awards -->

                            <div class="col-12">
                              <div class="q-px-lg">
                                <div class="row">
                                  <div class="col-12">
                                    <q-badge
                                      class="text-white text-bold"
                                      style="background-color: #45c26f"
                                    >
                                      100%
                                    </q-badge>
                                  </div>

                                  <div class="col-12 q-mt-md">
                                    <div class="col-12 row justify-between">
                                      <div class="text-h6 text-bold q-px-md">
                                        جوایز و افتخارات
                                      </div>
                                    </div>
                                  </div>

                                  <div
                                    class="col-12 q-mt-sm q-mb-md row justify-center items-center q-ml-md"
                                  >
                                    <q-item class="col-12 q-my-xs">
                                      <q-item-section class="q-pa-md">
                                        <q-item-label class="text-bold"
                                          >نفر اول کشوری جشنواره نوجوان
                                          خوارزمی</q-item-label
                                        >

                                        <div class="q-pt-md q-pb-sm">
                                          <span class="text-grey-7">1401</span>
                                        </div>
                                      </q-item-section>

                                      <q-item-section
                                        class="q-pa-sm row q-mr-lg"
                                        side
                                      >
                                        <div class="text-bold text-black">
                                          The first national winner of the
                                          Khwarazmi Youth Festival
                                        </div>

                                        <div
                                          class="text-bold q-py-sm text-black"
                                        >
                                          2022
                                        </div>
                                      </q-item-section>
                                    </q-item>
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
              </div>
            </div>

            <div class="col-4 q-pl-md">
              <!-- Phone Number, Audio Introduction And Upload Personal Resume -->

              <div>
                <div class="bg-white br-10">
                  <div class="row">
                    <!-- First Part -->

                    <div class="q-pa-md q-py-lg">
                      <div class="text-bold text-h6">اطلاعات تماس</div>

                      <div class="row full-width q-mt-md">
                        <div class="col-12">
                          <div class="row justify-between">
                            <div class="col-8">
                              <div class="text-weight-thin text-grey-6">
                                آدرس ایمیل
                              </div>
                              <div class="text-bold">
                                moeensedaghaty86@gmail.com
                              </div>
                            </div>
                          </div>
                        </div>

                        <div class="col-12 q-mt-md">
                          <div class="row justify-between">
                            <div class="col-8">
                              <div class="text-weight-thin text-grey-6">
                                شماره موبایل
                              </div>
                              <div class="text-bold">09379608155</div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Some Of My Works -->

              <div class="q-mt-lg">
                <div class="bg-white br-10">
                  <div class="row">
                    <div class="full-width">
                      <div class="q-px-md">
                        <div class="row">
                          <div class="col-12">
                            <q-badge
                              class="text-white text-bold"
                              style="background-color: #45c26f"
                            >
                              100%
                            </q-badge>
                          </div>
                        </div>

                        <!-- Declaration -->

                        <div class="full-width">
                          <div class="row justify-between">
                            <div class="text-h6 text-bold q-mt-sm">
                              نمونه کارها
                            </div>
                          </div>

                          <!-- Buttons And Links -->

                          <div class="row q-my-lg">
                            <div class="full-width">
                              <div
                                dir="ltr"
                                class="row justify-between q-pr-md"
                              >
                                <div class="col-7 row">
                                  <q-btn
                                    class="col-2"
                                    color="primary"
                                    rounded
                                    icon="link"
                                    unelevated
                                  />

                                  <div class="text-primary col-6">
                                    <q-btn
                                      flat
                                      href="https://moeensedaqati.ir/"
                                      target="_blank"
                                    >
                                      <div style="font-size: 12px">
                                        https://moeensedaqati.ir/
                                      </div>
                                    </q-btn>
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
              </div>

              <!-- Salary Insight -->

              <div class="q-mt-lg">
                <div class="bg-white br-10">
                  <div class="row">
                    <div class="full-width">
                      <div
                        style="background-color: #eeeffe !important"
                        class="br-10 q-py-md"
                      >
                        <div class="q-px-md row">
                          <div class="full-width">
                            <div class="row justify-center text-center">
                              <q-img
                                class="col-8"
                                src="https://jobvision.ir/assets/images/my-cv/salary-table.svg"
                              />

                              <div>
                                <div
                                  class="text-bold q-mt-md"
                                  style="font-size: 12px"
                                >
                                  از حقوق دریافتی افراد در مشاغل مختلف باخبر
                                  شوید
                                </div>

                                <div class="q-mt-sm" style="font-size: 11px">
                                  حقوق و دستمزد مشاغل مختلف را بررسی کنید و
                                  تخمین دقیق‌تری از حقوق منصفانه خود داشته
                                  باشید.
                                </div>

                                <div class="q-mt-md">
                                  <q-btn
                                    flat
                                    color="primary"
                                    class="text-bold"
                                    label="ماشین حساب حقوق و دست مزد"
                                    icon-right="west"
                                  />
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

              <!-- Test Results -->

              <div class="q-mt-lg">
                <div class="bg-white br-10">
                  <div class="row q-py-md">
                    <div class="full-width">
                      <div class="bg-white br-10">
                        <div class="q-px-md">
                          <!-- Declaration -->

                          <div class="full-width">
                            <div class="row justify-between">
                              <div class="text-h6 text-bold q-mt-sm">
                                نتایج آزمون‌ها
                              </div>
                            </div>
                          </div>

                          <div class="full-width q-mt-lg">
                            <div class="row justify-center">
                              <div class="col-12 row justify-between">
                                <div class="col-7 text-grey-7">
                                  <q-btn
                                    rounded
                                    disable
                                    dense
                                    color="grey-5"
                                    icon="done"
                                    class="q-mr-sm"
                                  />
                                  <span>Bar-On </span>
                                </div>

                                <div class="col-5 row justify-end">
                                  <q-btn
                                    flat
                                    color="primary"
                                    label="شرکت در آزمون"
                                  />
                                </div>
                              </div>

                              <div class="col-12 row justify-between q-mt-xs">
                                <div class="col-7 text-bold">
                                  <q-btn
                                    rounded
                                    disable
                                    dense
                                    color="primary"
                                    icon="done"
                                    class="q-mr-sm"
                                  />
                                  <span>MBTI </span>
                                </div>

                                <div class="col-5 row justify-end">
                                  <q-btn
                                    flat
                                    color="primary"
                                    label="مشاهده نتایج"
                                  />
                                </div>
                              </div>

                              <div class="col-12 row justify-between q-mt-xs">
                                <div class="col-7 text-grey-7">
                                  <q-btn
                                    rounded
                                    disable
                                    dense
                                    color="grey-5"
                                    icon="done"
                                    class="q-mr-sm"
                                  />
                                  <span>NEO </span>
                                </div>

                                <div class="col-5 row justify-end">
                                  <q-btn
                                    flat
                                    color="primary"
                                    label="شرکت در آزمون"
                                  />
                                </div>
                              </div>

                              <div class="col-12 row justify-between q-mt-xs">
                                <div class="col-7 text-grey-7">
                                  <q-btn
                                    rounded
                                    disable
                                    dense
                                    color="grey-5"
                                    icon="done"
                                    class="q-mr-sm"
                                  />
                                  <span>هوش های چندگانه</span>
                                </div>

                                <div class="col-5 row justify-end">
                                  <q-btn
                                    flat
                                    color="primary"
                                    label="شرکت در آزمون"
                                  />
                                </div>
                              </div>

                              <div class="col-12 row justify-between q-mt-xs">
                                <div class="col-7 text-grey-7">
                                  <q-btn
                                    rounded
                                    disable
                                    dense
                                    color="grey-5"
                                    icon="done"
                                    class="q-mr-sm"
                                  />
                                  <span>Holland </span>
                                </div>

                                <div class="col-5 row justify-end">
                                  <q-btn
                                    flat
                                    color="primary"
                                    label="شرکت در آزمون"
                                  />
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
            </div>
          </div>
        </div>
      </div>
    </div>

    <!--  Smaller Screen Content -->

    <div class="lt-lg">
      <!-- Header -->

      <div class="full-width bg-white row text-center q-pa-md lt-md">
        <div class="col-12 text-positive text-bold">100% تکمیل شده</div>

        <div class="col-12 q-mt-sm">
          <span class="text-grey-7">آخرین بروزرسانی:</span>
          <span class="text-gry-8 text-bold">7 دی 1402</span>
        </div>
      </div>

      <!-- POV -->

      <div class="row justify-center q-px-md lt-md">
        <div class="col-12 row justify-between items-center q-py-sm br-10">
          <div class="col-4 row items-center q-pl-sm">
            <q-icon size="20px" color="grey-7" name="visibility" />

            <q-btn-dropdown flat :label="preferred">
              <q-list>
                <q-item clickable v-close-popup @click="preferred = 'خودم'">
                  <q-item-section>
                    <q-item-label>خودم</q-item-label>
                  </q-item-section>
                </q-item>

                <q-item clickable v-close-popup @click="preferred = 'کارفرما'">
                  <q-item-section>
                    <q-item-label>کارفرما</q-item-label>
                  </q-item-section>
                </q-item>
              </q-list>
            </q-btn-dropdown>
          </div>

          <div
            class="col-8 row justify-end text-grey-8"
            v-if="preferred !== 'کارفرما'"
          >
            <q-btn flat class="q-mx-sm" label="دانلود رزومه" icon="download" />

            <q-btn flat class="q-mx-sm" icon="share" />
          </div>
        </div>
      </div>

      <!-- POV Medium -->

      <div class="row justify-center q-px-md gt-sm bg-white">
        <div class="col-12 row justify-between items-center q-py-sm br-10">
          <div class="col-4 row items-center q-pl-sm">
            <q-icon size="20px" color="grey-7" name="visibility" />

            <q-select
              class="q-pl-sm"
              v-model="preferred"
              :options="options"
              borderless
            >
              <template v-slot:selected>
                <div class="text-bold">{{ preferred.label }}</div>
              </template>
            </q-select>
          </div>

          <div
            class="col-8 row justify-end text-grey-8"
            v-if="preferred !== 'کارفرما'"
          >
            <q-btn flat class="q-mx-sm" label="دانلود رزومه" icon="download" />

            <q-btn flat class="q-mx-sm" icon="share" />
          </div>
        </div>
      </div>

      <!-- Design -->

      <div class="row justify-center">
        <div class="col-12 q-px-md q-my-md">
          <div class="row" v-if="preferred == 'خودم'">
            <!-- Myself -->

            <div class="col-xs-12 col-sm-12 col-md-8 col-8 q-pr-md">
              <div class="full-width">
                <div class="bg-white br-10">
                  <div class="q-px-sm">
                    <div class="row">
                      <div class="col-12">
                        <q-badge
                          class="text-white text-bold"
                          style="background-color: #45c26f"
                        >
                          100%
                        </q-badge>
                      </div>
                    </div>

                    <div class="full-width">
                      <div class="row justify-between">
                        <div class="text-bold q-mt-sm" style="font-size: 16px">
                          درباره من
                        </div>

                        <div>
                          <q-btn
                            dense
                            flat
                            class="text-grey-8"
                            label="ویرایش"
                            icon="edit"
                          />
                        </div>
                      </div>
                    </div>

                    <div class="col-12 row">
                      <div class="q-mt-md q-mb-lg row justify-between">
                        <div class="col-12">
                          <div class="full-width row justify-between">
                            <div>
                              <q-item>
                                <q-item-section top avatar>
                                  <q-avatar
                                    size="64px"
                                    color="blue-grey-3"
                                    text-color="white"
                                    @click="editToggle"
                                  >
                                    <q-icon size="80px" name="person" />
                                  </q-avatar>

                                  <div style="padding-left: 60px">
                                    <q-tooltip
                                      style="
                                        background-color: #dde1e6 !important;
                                      "
                                      v-model="editBTN"
                                    >
                                      <q-btn
                                        dense
                                        flat
                                        class="text-grey-9"
                                        icon="border_color"
                                      />
                                    </q-tooltip>
                                  </div>
                                </q-item-section>

                                <q-item-section class="q-px-md">
                                  <q-item-label
                                    style="font-size: 16px"
                                    class="text-bold"
                                    >معین صداقتی</q-item-label
                                  >
                                  <q-item-label
                                    class="q-pt-md"
                                    caption
                                    lines="2"
                                  >
                                    دولوپر فول استک در شرکت آیترونیک
                                    <q-icon
                                      class="q-pl-sm"
                                      name="edit"
                                      size="18px"
                                    />
                                  </q-item-label>
                                </q-item-section>
                              </q-item>
                            </div>

                            <div class="text-center col-xs-12 lt-sm">
                              <div class="q-py-md">
                                <q-btn
                                  class="col-8"
                                  flat
                                  color="primary"
                                  style="border: 2px dashed #5660f2"
                                  label="افزودن"
                                  icon="add"
                                />

                                <q-avatar class="q-mx-sm" size="25px">
                                  <q-img
                                    src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAOEAAADhCAMAAAAJbSJIAAAAt1BMVEULZsP////H1vEAYsMAWr4AV79IhM3V5fIAYMMMZcRIhsn//v5ymtQMZMUzd8kLZsQAasM0gsoLZsD///sAXr0AVMIqeckAXbwAYb4AX8UAVLj//f/7//8JZckAUcEAV8O80Or1+v+gvOaMrtzI3PA7fMZkmdLd6Pnl7vh2otnl8vcgd86Lqditx+ZAfcyYtNxnmNiFotRBjtA1eNO2zOuOtd2ev+R7qNm7zu7W6fJYj9bK4PDH3PdQecCoAAAFuElEQVR4nO2cC1PbOBRGpdoGCyNk5DhxQHkSaB4Fwm5Ld2H//+9a2YU8qOTSjZHXnu/MdJgBJ6PTe/W4smxCAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAACoAEZE/o8xIaUUsu7mfASSxUxLeh4jA8JF3c2pHs5I30/J3fn5Kgg6bYyh7ASL8YQWHE+7Aau7QZUiCM+CK0V3mF37jLC8c7aCmPvXc5pcvuqpJKF0mrYoVbl/o72iTRAjSpOIfr6Q+RDbCvo3VEct2qRopJJLrTsPZBsMJRPZHd3rg9vOmMoWGOrJvaf7oNGQLnotMIx554pGFkPV43W373A4D1SkzIoRve/X3b4K8Bbm+BUsh3U373BkMC4xpKvmT/kyndj9IvrFq7uBByP7dkHdOW/Duht4MNmZbaqg+RA79utu4MGwO7uh/sunFhh2226YScuS7YdhC7JUDEv6oZ7ymz/SSH9WEkJ60vzZYhBelRiqi7rbVwXCaqinw6Du1h0OI72xvSeeNX/RRhgbxHS3wN/N0jaEkMSEhN/NowydtKE8JJLxvLz4KU/1LxJdWLQgS3PkSCteqo3lS8oeNX+m2CDTb7t9UUV60b1cNX+y3yK4f3e8n6JXPa9FO8KC6TE1fRpv0nQ+DTu8DTuJ+3h+ev1l+nh7v47TrO7GfBBMeP1eP+wMWpSf+zDBOIulJHJQd1M+CEbk64/WRhEAUBfCwtt1NxN5tWVkU4QM8mMBkvA4PxyQeV7mMcKkHpwlacAArecR0/+GHnvl7tjLxYCHvdEwPlkvHtZ//Jmlvh/qeajG8dkSF5b77F6X25hizTnbKyS9gDx8ne+sc49vT2VQ491WFlvQkdlrucyTzkC2s0hnrBM+zF5r6KISU0XR8nzl+TU5eke2XZq3O97Bse3CblFKSiG9cDC1ft3tymeCS+fZ+luGlv3xbhEdNsj8b7TkLgH9GmYxdx7JSgxfLjiZ2Ha1CvSnF0P+/46hhcJQpI80SRJlN6SJojP321uHxzDR/ZCxsDcrS9AXFF3GoeOTSNUYEsmWNLIdW9m7eBJnbjO1IsNQd8FE/dpQf4UauC1AqzEMlvpHoi5Nf9+/NoroMmhYDBXtDt/TB7fMUiLc7XRVEcPVIo/ge/10Ln8Pibu+eLhhRFd6aabsd8vfXp9ENGbuJo0KYhjNqbpMSubBfVR+QGDk7pZIFWua/8C1uymxHsNk5u5xgHoMFV0564j1GEb0ttduQ714c3bOo6YsVfTIVUesaSxV7k521pWlydzVSY/qDJVeVNP5dL3KPBavHye/WsfFXDoZT6sz1NXh7OQi7BPGOPP6w5tJUlpr3PTdrL4rzFK1TkP2Y1NKl/EyHNlPBebc993cxavOcN4pNhUFL24A6KW1HH4qu/6vXqNiGCXzUSG3Rzq3PpBD6d8jF35VGeoZPH++5m3BkB+yttYcl45K/aqy9Mg4vflleZq5KRIrMhyPJBc/jxzeSclnYjePxVdkyJh51EiX9lnxzM25q2oMx75ll7dza/162g0bZPiUmWMo+6bTqy8cNcgwGXFp3HjhvFti2G+IYZLQZ9uTJ4KFdsMTrykzfkQfrZUQv7CvTZtjSOmD9Twx9+eWzzTIUNfra/uJaf+5+YZ6WXZnbSr3/2mBoXq5kW+Cl6zbmmRof7im9Yay9YbtjyEMP1yPwHAXGBqBoQNguAWGRmDoABhugaERGDoAhltgaASGDoDhFhgagaEDYLgFhkZg6AAYboGhERg6AIZbYGgEhg6A4RYYGoGhA9puyHhmN5z5e2fpfdubP5Iyw8D64Exy5+IAreCD9xt+tl5pP7kn7Yb0yHPwNIJkMj63cN3df39Ftj5dnJopeR1v9mT5zOli5SJL84ckTO9+Kt7/JN688cgLLXh2QUYy26dC0d63bAIAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAUBH/AiyZj3J3eJA/AAAAAElFTkSuQmCC"
                                  />
                                </q-avatar>
                              </div>
                            </div>

                            <div class="gt-xs">
                              <div class="q-py-md">
                                <q-btn
                                  class="col-8"
                                  flat
                                  color="primary"
                                  style="border: 2px dashed #5660f2"
                                  label="افزودن"
                                  icon="add"
                                />

                                <q-avatar class="q-mx-sm" size="25px">
                                  <q-img
                                    src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAOEAAADhCAMAAAAJbSJIAAAAt1BMVEULZsP////H1vEAYsMAWr4AV79IhM3V5fIAYMMMZcRIhsn//v5ymtQMZMUzd8kLZsQAasM0gsoLZsD///sAXr0AVMIqeckAXbwAYb4AX8UAVLj//f/7//8JZckAUcEAV8O80Or1+v+gvOaMrtzI3PA7fMZkmdLd6Pnl7vh2otnl8vcgd86Lqditx+ZAfcyYtNxnmNiFotRBjtA1eNO2zOuOtd2ev+R7qNm7zu7W6fJYj9bK4PDH3PdQecCoAAAFuElEQVR4nO2cC1PbOBRGpdoGCyNk5DhxQHkSaB4Fwm5Ld2H//+9a2YU8qOTSjZHXnu/MdJgBJ6PTe/W4smxCAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAACoAEZE/o8xIaUUsu7mfASSxUxLeh4jA8JF3c2pHs5I30/J3fn5Kgg6bYyh7ASL8YQWHE+7Aau7QZUiCM+CK0V3mF37jLC8c7aCmPvXc5pcvuqpJKF0mrYoVbl/o72iTRAjSpOIfr6Q+RDbCvo3VEct2qRopJJLrTsPZBsMJRPZHd3rg9vOmMoWGOrJvaf7oNGQLnotMIx554pGFkPV43W373A4D1SkzIoRve/X3b4K8Bbm+BUsh3U373BkMC4xpKvmT/kyndj9IvrFq7uBByP7dkHdOW/Duht4MNmZbaqg+RA79utu4MGwO7uh/sunFhh2226YScuS7YdhC7JUDEv6oZ7ymz/SSH9WEkJ60vzZYhBelRiqi7rbVwXCaqinw6Du1h0OI72xvSeeNX/RRhgbxHS3wN/N0jaEkMSEhN/NowydtKE8JJLxvLz4KU/1LxJdWLQgS3PkSCteqo3lS8oeNX+m2CDTb7t9UUV60b1cNX+y3yK4f3e8n6JXPa9FO8KC6TE1fRpv0nQ+DTu8DTuJ+3h+ev1l+nh7v47TrO7GfBBMeP1eP+wMWpSf+zDBOIulJHJQd1M+CEbk64/WRhEAUBfCwtt1NxN5tWVkU4QM8mMBkvA4PxyQeV7mMcKkHpwlacAArecR0/+GHnvl7tjLxYCHvdEwPlkvHtZ//Jmlvh/qeajG8dkSF5b77F6X25hizTnbKyS9gDx8ne+sc49vT2VQ491WFlvQkdlrucyTzkC2s0hnrBM+zF5r6KISU0XR8nzl+TU5eke2XZq3O97Bse3CblFKSiG9cDC1ft3tymeCS+fZ+luGlv3xbhEdNsj8b7TkLgH9GmYxdx7JSgxfLjiZ2Ha1CvSnF0P+/46hhcJQpI80SRJlN6SJojP321uHxzDR/ZCxsDcrS9AXFF3GoeOTSNUYEsmWNLIdW9m7eBJnbjO1IsNQd8FE/dpQf4UauC1AqzEMlvpHoi5Nf9+/NoroMmhYDBXtDt/TB7fMUiLc7XRVEcPVIo/ge/10Ln8Pibu+eLhhRFd6aabsd8vfXp9ENGbuJo0KYhjNqbpMSubBfVR+QGDk7pZIFWua/8C1uymxHsNk5u5xgHoMFV0564j1GEb0ttduQ714c3bOo6YsVfTIVUesaSxV7k521pWlydzVSY/qDJVeVNP5dL3KPBavHye/WsfFXDoZT6sz1NXh7OQi7BPGOPP6w5tJUlpr3PTdrL4rzFK1TkP2Y1NKl/EyHNlPBebc993cxavOcN4pNhUFL24A6KW1HH4qu/6vXqNiGCXzUSG3Rzq3PpBD6d8jF35VGeoZPH++5m3BkB+yttYcl45K/aqy9Mg4vflleZq5KRIrMhyPJBc/jxzeSclnYjePxVdkyJh51EiX9lnxzM25q2oMx75ll7dza/162g0bZPiUmWMo+6bTqy8cNcgwGXFp3HjhvFti2G+IYZLQZ9uTJ4KFdsMTrykzfkQfrZUQv7CvTZtjSOmD9Twx9+eWzzTIUNfra/uJaf+5+YZ6WXZnbSr3/2mBoXq5kW+Cl6zbmmRof7im9Yay9YbtjyEMP1yPwHAXGBqBoQNguAWGRmDoABhugaERGDoAhltgaASGDoDhFhgagaEDYLgFhkZg6AAYboGhERg6AIZbYGgEhg6A4RYYGoGhA9puyHhmN5z5e2fpfdubP5Iyw8D64Exy5+IAreCD9xt+tl5pP7kn7Yb0yHPwNIJkMj63cN3df39Ftj5dnJopeR1v9mT5zOli5SJL84ckTO9+Kt7/JN688cgLLXh2QUYy26dC0d63bAIAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAUBH/AiyZj3J3eJA/AAAAAElFTkSuQmCC"
                                  />
                                </q-avatar>
                              </div>
                            </div>
                          </div>
                        </div>

                        <div class="row q-px-sm">
                          <div class="col-12 q-mt-md text-grey-8">
                            معین صداقتی متولد سال 1386/9/9. از 13 سالگی شروع به
                            یاد گیری برنامه نویسی کردم و از 15 سالگی به صورت جدی
                            برنامه نویسی میکنم.
                          </div>

                          <div dir="ltr" class="col-12 q-mt-lg text-grey-8">
                            Moeen Sedaqati born on 9/9/1386. I started learning
                            programming when I was 13 years old, and I started
                            programming seriously when I was 15 years old.
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="q-mt-sm">
                <div class="full-width">
                  <div class="bg-white br-10">
                    <div class="q-px-sm">
                      <div class="row">
                        <div class="col-12">
                          <q-badge
                            class="text-white text-bold"
                            style="background-color: #45c26f"
                          >
                            100%
                          </q-badge>
                        </div>

                        <div class="full-width">
                          <div class="row justify-between">
                            <div
                              class="text-bold q-mt-sm"
                              style="font-size: 16px"
                            >
                              اطلاعات اولیه
                            </div>

                            <div>
                              <q-btn
                                dense
                                flat
                                class="text-grey-8"
                                label="ویرایش"
                                icon="edit"
                              />
                            </div>
                          </div>
                        </div>

                        <div class="row justify-between q-mt-sm full-width">
                          <div class="col-12 row justify-between q-pb-sm">
                            <div class="col-5">
                              <div>
                                <div class="text-weight-thin text-grey-8">
                                  نام و نام خانوادگی
                                </div>
                                <div class="text-bold">معین صداقتی</div>
                              </div>

                              <div class="q-mt-md">
                                <div class="text-weight-thin text-grey-8">
                                  جنسیت
                                </div>
                                <div class="text-bold">مرد</div>
                              </div>

                              <div class="q-mt-md">
                                <div class="text-weight-thin text-grey-8">
                                  وضعیت تاهل
                                </div>
                                <div class="text-bold">مجرد</div>
                              </div>

                              <div class="q-mt-md">
                                <div class="text-weight-thin text-grey-8">
                                  وضعیت نظام وظیفه
                                </div>
                                <div class="text-bold">معافیت تحصیلی</div>
                              </div>

                              <div class="q-mt-md">
                                <div class="text-weight-thin text-grey-8">
                                  شهر محل سکونت
                                </div>
                                <div class="text-bold">گنبد کاووس</div>
                              </div>

                              <div class="q-mt-md">
                                <div class="text-weight-thin text-grey-8">
                                  محل سکونت
                                </div>
                                <div class="text-bold">
                                  خیابان بعثت غربی نرسیده به چهارراه فردوسی جنب
                                  یخچال سازی صوفی زاده
                                </div>
                              </div>

                              <div class="q-mt-md">
                                <div class="text-weight-thin text-grey-8">
                                  تاریخ تولد
                                </div>
                                <div class="text-bold">1386/09/09</div>
                              </div>

                              <div class="q-mt-md">
                                <div class="text-weight-thin text-grey-8">
                                  شماره ثابت
                                </div>
                                <div class="text-bold">33231884</div>
                              </div>

                              <div class="q-mt-md">
                                <div class="text-weight-thin text-grey-8">
                                  حقوق درخواستی
                                </div>
                                <div class="text-bold">8 - 6 میلیون تومان</div>
                              </div>

                              <div class="q-mt-md">
                                <div class="text-weight-thin text-grey-8">
                                  گروه شغلی مورد علاقه
                                </div>
                                <div class="text-bold">
                                  توسعه نرم افزار و برنامه نویسی
                                </div>
                              </div>
                            </div>

                            <div dir="ltr" class="col-5">
                              <div>
                                <div class="text-weight-thin text-grey-8">
                                  First and Last Name
                                </div>
                                <div class="text-bold">Moeen Sedaqati</div>
                              </div>

                              <div class="q-mt-md">
                                <div class="text-weight-thin text-grey-8">
                                  Gender
                                </div>
                                <div class="text-bold">Male</div>
                              </div>

                              <div class="q-mt-md">
                                <div class="text-weight-thin text-grey-8">
                                  Marital Status
                                </div>
                                <div class="text-bold">Single</div>
                              </div>

                              <div class="q-mt-md">
                                <div class="text-weight-thin text-grey-8">
                                  Military Service Status
                                </div>
                                <div class="text-bold">
                                  Educational Exemption
                                </div>
                              </div>

                              <div class="q-mt-md">
                                <div class="text-weight-thin text-grey-8">
                                  City
                                </div>
                                <div class="text-bold">Gonbad kavoos</div>
                              </div>

                              <div class="q-mt-md">
                                <div class="text-weight-thin text-grey-8">
                                  Region
                                </div>
                                <div class="text-bold">
                                  West Ba'ath St. has not reached the Ferdowsi
                                  intersection, next to Sufizadeh refrigerator
                                </div>
                              </div>

                              <div class="q-mt-md">
                                <div class="text-weight-thin text-grey-8">
                                  Date of Birth
                                </div>
                                <div class="text-bold">2007-11-30</div>
                              </div>

                              <div class="q-mt-md">
                                <div class="text-weight-thin text-grey-8">
                                  Phone Number
                                </div>
                                <div class="text-bold">33231884</div>
                              </div>

                              <div class="q-mt-md">
                                <div class="text-weight-thin text-grey-8">
                                  Expected Salary
                                </div>
                                <div class="text-bold">
                                  6 - 8 Million Tomans
                                </div>
                              </div>

                              <div class="q-mt-md">
                                <div class="text-weight-thin text-grey-8">
                                  Preferred Job Category
                                </div>
                                <div class="text-bold">
                                  IT - Software Development (Web,Moblie,…)
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

              <!-- Educational Records -->

              <div class="q-mt-sm">
                <div class="full-width">
                  <div class="bg-white br-10">
                    <div class="q-px-sm">
                      <div class="row">
                        <div class="col-12">
                          <q-badge
                            class="text-white text-bold"
                            style="background-color: #45c26f"
                          >
                            100%
                          </q-badge>
                        </div>

                        <div class="col-12 q-mt-md">
                          <div class="col-12 row justify-between">
                            <div
                              class="text-bold q-mt-sm"
                              style="font-size: 16px"
                            >
                              سوابق تحصیلی
                            </div>

                            <!-- <div>
                            <q-btn
                              dense
                              flat
                              color="primary"
                              label="افزودن"
                              icon="add_circle"
                              class="q-pr-md"
                            />
                          </div> -->
                          </div>
                        </div>

                        <div class="col-12 q-mt-md q-mb-sm">
                          <q-checkbox v-model="val" label="تحصیلات دانشگاهی" />
                        </div>

                        <div class="col-12 q-mb-md q-ml-md">
                          <q-radio
                            class="q-mb-xs full-width"
                            v-model="shape"
                            val="DY"
                            label="مدرک تحصیلی دیپلم دارم."
                          />
                          <q-radio
                            class="q-my-xs full-width"
                            v-model="shape"
                            val="DN"
                            label="مدرک تحصیلی زیر دیپلم دارم."
                          />
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Experience -->

              <div class="q-mt-sm">
                <div class="full-width">
                  <div class="bg-white br-10">
                    <div class="q-px-sm">
                      <div class="row">
                        <div class="col-12">
                          <q-badge
                            class="text-white text-bold"
                            style="background-color: #45c26f"
                          >
                            100%
                          </q-badge>
                        </div>

                        <div class="col-12 q-mt-md">
                          <div class="col-12 row justify-between">
                            <div
                              class="text-bold q-mt-sm"
                              style="font-size: 16px"
                            >
                              سوابق شغلی
                            </div>

                            <div>
                              <q-btn
                                dense
                                flat
                                color="primary"
                                label="افزودن"
                                icon="add_circle"
                                class="q-pr-md"
                              />
                            </div>
                          </div>
                        </div>

                        <div
                          class="col-12 q-mt-md q-mb-md row justify-center items-center"
                        >
                          <q-item
                            style="background-color: white; border-radius: 8px"
                            class="col-12 q-my-xs"
                          >
                            <q-item-section class="gt-xs" avatar>
                              <div
                                class="br-10 row q-py-md"
                                style="background-color: #f6f7f9 !important"
                              >
                                <q-btn
                                  color="grey-7"
                                  flat
                                  dense
                                  class="col-12"
                                  icon="edit"
                                />
                                <q-btn
                                  color="grey-7"
                                  flat
                                  dense
                                  class="col-12"
                                  icon="delete "
                                />
                              </div>
                            </q-item-section>

                            <q-item-section class="q-pa-md">
                              <q-item-label
                                class="text-bold"
                                style="line-height: 2.2 !important"
                                >دولوپر فول استک در شرکت آیترونیک</q-item-label
                              >

                              <div class="q-py-md">
                                <span class="text-bold">آیترونیک</span>
                              </div>

                              <div class="text-grey-6">از تیر 1402 تاکنون</div>
                            </q-item-section>

                            <q-item-section
                              class="q-pa-sm row q-mr-md gt-xs"
                              side
                            >
                              <div class="text-bold text-black">
                                Full Stack Developer
                              </div>

                              <div class="text-bold q-my-md text-black">
                                Aytronic
                              </div>

                              <div class="text-grey-6">June 2023 - Present</div>
                            </q-item-section>
                          </q-item>

                          <!-- Action Bottons On Small Screen -->

                          <div class="lt-sm col-6">
                            <div class="text-center">
                              <div
                                class="br-10 row q-px-md"
                                style="background-color: #f6f7f9 !important"
                              >
                                <q-btn
                                  color="grey-7"
                                  flat
                                  dense
                                  class="col-6"
                                  icon="edit"
                                />

                                <q-btn
                                  color="grey-7"
                                  flat
                                  dense
                                  class="col-6"
                                  icon="delete "
                                />
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Langs -->

              <div class="q-mt-sm">
                <div class="full-width">
                  <div class="bg-white br-10">
                    <div class="q-px-sm">
                      <div class="row">
                        <div class="col-12">
                          <q-badge
                            class="text-white text-bold"
                            style="background-color: #45c26f"
                          >
                            100%
                          </q-badge>
                        </div>

                        <div class="col-12 q-mt-md">
                          <div class="col-12 row justify-between">
                            <div
                              class="text-bold q-mt-sm"
                              style="font-size: 16px"
                            >
                              زبان‌ها
                            </div>

                            <div>
                              <q-btn
                                dense
                                flat
                                color="primary"
                                label="افزودن"
                                icon="add_circle"
                                class="q-pr-md"
                              />
                            </div>
                          </div>
                        </div>

                        <div class="col-12 row justify-between q-my-md">
                          <div
                            class="col-xs-10 col-sm-5 col-md-5 col-5 row items-center"
                          >
                            <div>
                              <div class="row items-center q-mt-md">
                                <q-icon
                                  size="20px"
                                  class="q-px-xs"
                                  color="grey-7"
                                  name="delete"
                                />
                                <div
                                  class="text-white row q-px-sm q-py-xs br-10"
                                  style="
                                    background-color: #5c6573 !important;
                                    padding-top: 5px;
                                    padding-bottom: 5px;
                                  "
                                >
                                  <div class="text-bold q-ml-sm">انگلیسی</div>

                                  <q-separator
                                    color="white"
                                    class="q-mx-sm q-my-xs"
                                    vertical
                                  />

                                  <div>بالاتر از متوسط</div>
                                </div>
                              </div>
                            </div>

                            <div>
                              <div class="row items-center q-mt-md">
                                <q-icon
                                  size="20px"
                                  class="q-px-xs"
                                  color="grey-7"
                                  name="delete"
                                />
                                <div
                                  class="text-white row q-px-sm q-py-xs br-10"
                                  style="
                                    background-color: #5c6573 !important;
                                    padding-top: 5px;
                                    padding-bottom: 5px;
                                  "
                                >
                                  <div class="text-bold q-ml-sm">فارسی</div>

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

                          <div class="col-5 row justify-end q-mr-md gt-xs">
                            <div>
                              <div class="row items-center q-mt-md">
                                <div
                                  class="text-white row q-px-sm q-py-xs br-10"
                                  style="
                                    background-color: #5c6573 !important;
                                    padding-top: 5px;
                                    padding-bottom: 5px;
                                  "
                                >
                                  <div>Upper Intermediate</div>

                                  <q-separator
                                    color="white"
                                    class="q-mx-sm q-my-xs"
                                    vertical
                                  />

                                  <div class="text-bold q-ml-sm">English</div>
                                </div>
                              </div>
                            </div>

                            <div>
                              <div class="row items-center q-mt-md">
                                <div
                                  class="text-white row q-px-sm q-py-xs br-10"
                                  style="
                                    background-color: #5c6573 !important;
                                    padding-top: 5px;
                                    padding-bottom: 5px;
                                  "
                                >
                                  <div>Advanced</div>

                                  <q-separator
                                    color="white"
                                    class="q-mx-sm q-my-xs"
                                    vertical
                                  />

                                  <div class="text-bold q-ml-sm">Persian</div>
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

              <!-- Skills -->

              <div class="q-mt-sm">
                <div class="full-width">
                  <div class="bg-white br-10">
                    <div class="q-px-sm">
                      <div class="row">
                        <div class="col-12">
                          <q-badge
                            class="text-white text-bold"
                            style="background-color: #45c26f"
                          >
                            100%
                          </q-badge>
                        </div>

                        <div class="col-12 q-mt-md">
                          <div class="col-12 row justify-between">
                            <div
                              class="text-bold q-mt-sm"
                              style="font-size: 16px"
                            >
                              مهارت های نرم افزاری
                            </div>

                            <div>
                              <q-btn
                                dense
                                flat
                                color="primary"
                                label="افزودن"
                                icon="add_circle"
                                class="q-pr-md"
                              />
                            </div>
                          </div>
                        </div>

                        <div class="col-12 row q-my-sm">
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

                                <div
                                  class="text-bold q-ml-sm"
                                  style="font-size: 13px"
                                >
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

                                <div
                                  class="text-bold q-ml-sm"
                                  style="font-size: 13px"
                                >
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

                                <div
                                  class="text-bold q-ml-sm"
                                  style="font-size: 13px"
                                >
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
                    </div>
                  </div>
                </div>
              </div>

              <!-- Additional Skills -->

              <div class="q-mt-sm">
                <div class="full-width">
                  <div class="bg-white br-10">
                    <div class="q-px-sm">
                      <div class="row">
                        <div class="col-12">
                          <q-badge
                            class="text-white text-bold"
                            style="background-color: #45c26f"
                          >
                            100%
                          </q-badge>
                        </div>

                        <div class="col-12 q-mt-md">
                          <div class="col-12 row justify-between">
                            <div
                              class="text-bold q-mt-sm"
                              style="font-size: 16px"
                            >
                              مهارت های تکمیلی
                            </div>

                            <div>
                              <q-btn
                                dense
                                flat
                                color="primary"
                                label="افزودن"
                                icon="add_circle"
                                class="q-pr-md"
                              />
                            </div>
                          </div>
                        </div>

                        <div class="full-width lt-md">
                          <div class="q-my-sm">
                            <div class="row">
                              <div class="col-12">
                                <div class="col-12 row items-center q-mt-sm">
                                  <div>
                                    <div
                                      class="text-white row q-px-sm q-pb-xs"
                                      style="
                                        padding-top: 5px;
                                        padding-bottom: 5px;
                                      "
                                    >
                                      <div
                                        class="text-grey-6"
                                        style="font-size: 13px"
                                      >
                                        مهارت‌ها در رزومه فارسی (6 مهارت)
                                      </div>
                                    </div>
                                  </div>
                                </div>

                                <!-- Skills -->

                                <div class="col-12 row items-center q-mt-sm">
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

                                      <div
                                        class="text-bold q-ml-sm"
                                        style="font-size: 13px"
                                      >
                                        برنامه نویسی فرانت اند
                                      </div>
                                    </div>
                                  </div>
                                </div>

                                <div class="col-12 row items-center q-mt-sm">
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

                                      <div
                                        class="text-bold q-ml-sm"
                                        style="font-size: 13px"
                                      >
                                        سی اس اس
                                      </div>
                                    </div>
                                  </div>
                                </div>

                                <div class="col-12 row items-center q-mt-sm">
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

                                      <div
                                        class="text-bold q-ml-sm"
                                        style="font-size: 13px"
                                      >
                                        فیگما
                                      </div>
                                    </div>
                                  </div>
                                </div>

                                <div class="col-12 row items-center q-mt-sm">
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

                                      <div
                                        class="text-bold q-ml-sm"
                                        style="font-size: 13px"
                                      >
                                        اچ تی ام ال
                                      </div>
                                    </div>
                                  </div>
                                </div>

                                <div class="col-12 row items-center q-mt-sm">
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

                                      <div
                                        class="text-bold q-ml-sm"
                                        style="font-size: 13px"
                                      >
                                        کویزار
                                      </div>
                                    </div>
                                  </div>
                                </div>

                                <div class="col-12 row items-center q-mt-sm">
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

                                      <div
                                        class="text-bold q-ml-sm"
                                        style="font-size: 13px"
                                      >
                                        لاراول
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>

                              <q-separator
                                class="q-mb-md q-mt-sm q-mx-xs full-width"
                              />

                              <div class="col-12 row">
                                <div
                                  class="col-12 row justify-end items-center q-mt-sm"
                                >
                                  <div>
                                    <div
                                      class="text-white row q-px-sm q-pb-xs q-mr-sm"
                                      style="
                                        padding-top: 5px;
                                        padding-bottom: 5px;
                                      "
                                    >
                                      <div
                                        class="text-grey-6"
                                        style="font-size: 13px"
                                      >
                                        Skills in English Resume (8 skills)
                                      </div>
                                    </div>
                                  </div>
                                </div>

                                <!-- Skills -->

                                <div
                                  class="col-12 row justify-end items-center q-mt-sm"
                                >
                                  <div>
                                    <div
                                      class="text-white row q-pl-sm q-py-xs br-8 q-mr-md"
                                      style="
                                        background-color: #5c6573 !important;
                                        padding-top: 5px;
                                        padding-bottom: 5px;
                                      "
                                    >
                                      <div
                                        class="text-bold q-mr-sm"
                                        style="font-size: 13px"
                                      >
                                        HTML
                                      </div>

                                      <q-icon
                                        size="20px"
                                        class="q-px-xs"
                                        color="grey-5"
                                        name="delete"
                                      />
                                    </div>
                                  </div>
                                </div>

                                <div
                                  class="col-12 row justify-end items-center q-mt-sm"
                                >
                                  <div>
                                    <div
                                      class="text-white row q-pl-sm q-py-xs br-8 q-mr-md"
                                      style="
                                        background-color: #5c6573 !important;
                                        padding-top: 5px;
                                        padding-bottom: 5px;
                                      "
                                    >
                                      <div
                                        class="text-bold q-ml-sm"
                                        style="font-size: 13px"
                                      >
                                        Quasar
                                      </div>

                                      <q-icon
                                        size="20px"
                                        class="q-px-xs"
                                        color="grey-5"
                                        name="delete"
                                      />
                                    </div>
                                  </div>
                                </div>

                                <div
                                  class="col-12 row justify-end items-center q-mt-sm"
                                >
                                  <div>
                                    <div
                                      class="text-white row q-pl-sm q-py-xs br-8 q-mr-md"
                                      style="
                                        background-color: #5c6573 !important;
                                        padding-top: 5px;
                                        padding-bottom: 5px;
                                      "
                                    >
                                      <div
                                        class="text-bold q-ml-sm"
                                        style="font-size: 13px"
                                      >
                                        vue.js
                                      </div>

                                      <q-icon
                                        size="20px"
                                        class="q-px-xs"
                                        color="grey-5"
                                        name="delete"
                                      />
                                    </div>
                                  </div>
                                </div>

                                <div
                                  class="col-12 row justify-end items-center q-mt-sm"
                                >
                                  <div>
                                    <div
                                      class="text-white row q-pl-sm q-py-xs br-8 q-mr-md"
                                      style="
                                        background-color: #5c6573 !important;
                                        padding-top: 5px;
                                        padding-bottom: 5px;
                                      "
                                    >
                                      <div
                                        class="text-bold q-ml-sm"
                                        style="font-size: 13px"
                                      >
                                        vue router
                                      </div>

                                      <q-icon
                                        size="20px"
                                        class="q-px-xs"
                                        color="grey-5"
                                        name="delete"
                                      />
                                    </div>
                                  </div>
                                </div>

                                <div
                                  class="col-12 row justify-end items-center q-mt-sm"
                                >
                                  <div>
                                    <div
                                      class="text-white row q-pl-sm q-py-xs br-8 q-mr-md"
                                      style="
                                        background-color: #5c6573 !important;
                                        padding-top: 5px;
                                        padding-bottom: 5px;
                                      "
                                    >
                                      <div
                                        class="text-bold q-ml-sm"
                                        style="font-size: 13px"
                                      >
                                        Vue CLi
                                      </div>

                                      <q-icon
                                        size="20px"
                                        class="q-px-xs"
                                        color="grey-5"
                                        name="delete"
                                      />
                                    </div>
                                  </div>
                                </div>

                                <div
                                  class="col-12 row justify-end items-center q-mt-sm"
                                >
                                  <div>
                                    <div
                                      class="text-white row q-pl-sm q-py-xs br-8 q-mr-md"
                                      style="
                                        background-color: #5c6573 !important;
                                        padding-top: 5px;
                                        padding-bottom: 5px;
                                      "
                                    >
                                      <div
                                        class="text-bold q-ml-sm"
                                        style="font-size: 13px"
                                      >
                                        Laravel
                                      </div>

                                      <q-icon
                                        size="20px"
                                        class="q-px-xs"
                                        color="grey-5"
                                        name="delete"
                                      />
                                    </div>
                                  </div>
                                </div>

                                <div
                                  class="col-12 row justify-end items-center q-mt-sm"
                                >
                                  <div>
                                    <div
                                      class="text-white row q-pl-sm q-py-xs br-8 q-mr-md"
                                      style="
                                        background-color: #5c6573 !important;
                                        padding-top: 5px;
                                        padding-bottom: 5px;
                                      "
                                    >
                                      <div
                                        class="text-bold q-ml-sm"
                                        style="font-size: 13px"
                                      >
                                        Css3
                                      </div>

                                      <q-icon
                                        size="20px"
                                        class="q-px-xs"
                                        color="grey-5"
                                        name="delete"
                                      />
                                    </div>
                                  </div>
                                </div>

                                <div
                                  class="col-12 row justify-end items-center q-mt-sm"
                                >
                                  <div>
                                    <div
                                      class="text-white row q-pl-sm q-py-xs br-8 q-mr-md"
                                      style="
                                        background-color: #5c6573 !important;
                                        padding-top: 5px;
                                        padding-bottom: 5px;
                                      "
                                    >
                                      <div
                                        class="text-bold q-ml-sm"
                                        style="font-size: 13px"
                                      >
                                        Figma
                                      </div>

                                      <q-icon
                                        size="20px"
                                        class="q-px-xs"
                                        color="grey-5"
                                        name="delete"
                                      />
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>

                        <div class="full-width gt-sm">
                          <div class="q-my-lg">
                            <div class="row">
                              <div class="col">
                                <div class="col-12 row items-center q-mt-sm">
                                  <div>
                                    <div
                                      class="text-white row q-px-sm q-pb-xs"
                                      style="
                                        padding-top: 5px;
                                        padding-bottom: 5px;
                                      "
                                    >
                                      <div
                                        class="text-grey-6"
                                        style="font-size: 13px"
                                      >
                                        مهارت‌ها در رزومه فارسی (6 مهارت)
                                      </div>
                                    </div>
                                  </div>
                                </div>

                                <!-- Skills -->

                                <div class="col-12 row items-center q-mt-sm">
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

                                      <div
                                        class="text-bold q-ml-sm"
                                        style="font-size: 13px"
                                      >
                                        برنامه نویسی فرانت اند
                                      </div>
                                    </div>
                                  </div>
                                </div>

                                <div class="col-12 row items-center q-mt-sm">
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

                                      <div
                                        class="text-bold q-ml-sm"
                                        style="font-size: 13px"
                                      >
                                        سی اس اس
                                      </div>
                                    </div>
                                  </div>
                                </div>

                                <div class="col-12 row items-center q-mt-sm">
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

                                      <div
                                        class="text-bold q-ml-sm"
                                        style="font-size: 13px"
                                      >
                                        فیگما
                                      </div>
                                    </div>
                                  </div>
                                </div>

                                <div class="col-12 row items-center q-mt-sm">
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

                                      <div
                                        class="text-bold q-ml-sm"
                                        style="font-size: 13px"
                                      >
                                        اچ تی ام ال
                                      </div>
                                    </div>
                                  </div>
                                </div>

                                <div class="col-12 row items-center q-mt-sm">
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

                                      <div
                                        class="text-bold q-ml-sm"
                                        style="font-size: 13px"
                                      >
                                        کویزار
                                      </div>
                                    </div>
                                  </div>
                                </div>

                                <div class="col-12 row items-center q-mt-sm">
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

                                      <div
                                        class="text-bold q-ml-sm"
                                        style="font-size: 13px"
                                      >
                                        لاراول
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>

                              <q-separator class="q-my-xs q-mx-xs" vertical />

                              <div class="col row">
                                <div
                                  class="col-12 row justify-end items-center q-mt-sm"
                                >
                                  <div>
                                    <div
                                      class="text-white row q-px-sm q-pb-xs q-mr-sm"
                                      style="
                                        padding-top: 5px;
                                        padding-bottom: 5px;
                                      "
                                    >
                                      <div
                                        class="text-grey-6"
                                        style="font-size: 13px"
                                      >
                                        Skills in English Resume (8 skills)
                                      </div>
                                    </div>
                                  </div>
                                </div>

                                <!-- Skills -->

                                <div
                                  class="col-12 row justify-end items-center q-mt-sm"
                                >
                                  <div>
                                    <div
                                      class="text-white row q-pl-sm q-py-xs br-8 q-mr-md"
                                      style="
                                        background-color: #5c6573 !important;
                                        padding-top: 5px;
                                        padding-bottom: 5px;
                                      "
                                    >
                                      <div
                                        class="text-bold q-mr-sm"
                                        style="font-size: 13px"
                                      >
                                        HTML
                                      </div>

                                      <q-icon
                                        size="20px"
                                        class="q-px-xs"
                                        color="grey-5"
                                        name="delete"
                                      />
                                    </div>
                                  </div>
                                </div>

                                <div
                                  class="col-12 row justify-end items-center q-mt-sm"
                                >
                                  <div>
                                    <div
                                      class="text-white row q-pl-sm q-py-xs br-8 q-mr-md"
                                      style="
                                        background-color: #5c6573 !important;
                                        padding-top: 5px;
                                        padding-bottom: 5px;
                                      "
                                    >
                                      <div
                                        class="text-bold q-ml-sm"
                                        style="font-size: 13px"
                                      >
                                        Quasar
                                      </div>

                                      <q-icon
                                        size="20px"
                                        class="q-px-xs"
                                        color="grey-5"
                                        name="delete"
                                      />
                                    </div>
                                  </div>
                                </div>

                                <div
                                  class="col-12 row justify-end items-center q-mt-sm"
                                >
                                  <div>
                                    <div
                                      class="text-white row q-pl-sm q-py-xs br-8 q-mr-md"
                                      style="
                                        background-color: #5c6573 !important;
                                        padding-top: 5px;
                                        padding-bottom: 5px;
                                      "
                                    >
                                      <div
                                        class="text-bold q-ml-sm"
                                        style="font-size: 13px"
                                      >
                                        vue.js
                                      </div>

                                      <q-icon
                                        size="20px"
                                        class="q-px-xs"
                                        color="grey-5"
                                        name="delete"
                                      />
                                    </div>
                                  </div>
                                </div>

                                <div
                                  class="col-12 row justify-end items-center q-mt-sm"
                                >
                                  <div>
                                    <div
                                      class="text-white row q-pl-sm q-py-xs br-8 q-mr-md"
                                      style="
                                        background-color: #5c6573 !important;
                                        padding-top: 5px;
                                        padding-bottom: 5px;
                                      "
                                    >
                                      <div
                                        class="text-bold q-ml-sm"
                                        style="font-size: 13px"
                                      >
                                        vue router
                                      </div>

                                      <q-icon
                                        size="20px"
                                        class="q-px-xs"
                                        color="grey-5"
                                        name="delete"
                                      />
                                    </div>
                                  </div>
                                </div>

                                <div
                                  class="col-12 row justify-end items-center q-mt-sm"
                                >
                                  <div>
                                    <div
                                      class="text-white row q-pl-sm q-py-xs br-8 q-mr-md"
                                      style="
                                        background-color: #5c6573 !important;
                                        padding-top: 5px;
                                        padding-bottom: 5px;
                                      "
                                    >
                                      <div
                                        class="text-bold q-ml-sm"
                                        style="font-size: 13px"
                                      >
                                        Vue CLi
                                      </div>

                                      <q-icon
                                        size="20px"
                                        class="q-px-xs"
                                        color="grey-5"
                                        name="delete"
                                      />
                                    </div>
                                  </div>
                                </div>

                                <div
                                  class="col-12 row justify-end items-center q-mt-sm"
                                >
                                  <div>
                                    <div
                                      class="text-white row q-pl-sm q-py-xs br-8 q-mr-md"
                                      style="
                                        background-color: #5c6573 !important;
                                        padding-top: 5px;
                                        padding-bottom: 5px;
                                      "
                                    >
                                      <div
                                        class="text-bold q-ml-sm"
                                        style="font-size: 13px"
                                      >
                                        Laravel
                                      </div>

                                      <q-icon
                                        size="20px"
                                        class="q-px-xs"
                                        color="grey-5"
                                        name="delete"
                                      />
                                    </div>
                                  </div>
                                </div>

                                <div
                                  class="col-12 row justify-end items-center q-mt-sm"
                                >
                                  <div>
                                    <div
                                      class="text-white row q-pl-sm q-py-xs br-8 q-mr-md"
                                      style="
                                        background-color: #5c6573 !important;
                                        padding-top: 5px;
                                        padding-bottom: 5px;
                                      "
                                    >
                                      <div
                                        class="text-bold q-ml-sm"
                                        style="font-size: 13px"
                                      >
                                        Css3
                                      </div>

                                      <q-icon
                                        size="20px"
                                        class="q-px-xs"
                                        color="grey-5"
                                        name="delete"
                                      />
                                    </div>
                                  </div>
                                </div>

                                <div
                                  class="col-12 row justify-end items-center q-mt-sm"
                                >
                                  <div>
                                    <div
                                      class="text-white row q-pl-sm q-py-xs br-8 q-mr-md"
                                      style="
                                        background-color: #5c6573 !important;
                                        padding-top: 5px;
                                        padding-bottom: 5px;
                                      "
                                    >
                                      <div
                                        class="text-bold q-ml-sm"
                                        style="font-size: 13px"
                                      >
                                        Figma
                                      </div>

                                      <q-icon
                                        size="20px"
                                        class="q-px-xs"
                                        color="grey-5"
                                        name="delete"
                                      />
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
                </div>
              </div>

              <!-- More -->

              <div class="q-mt-sm">
                <div class="full-width">
                  <div class="row">
                    <div class="col-12 row">
                      <div class="col-12 text-center q-my-md text-bold">
                        افزایش شانس استخدام شما تنها با تکمیل کردن اطلاعات
                        تکمیلی زیر
                      </div>

                      <!-- Content -->

                      <div class="full-width">
                        <div class="q-mt-sm">
                          <div class="bg-white br-10">
                            <!-- Partners -->

                            <div class="q-px-sm">
                              <div class="row">
                                <div class="col-12">
                                  <q-badge
                                    class="text-white text-bold"
                                    style="background-color: #45c26f"
                                  >
                                    100%
                                  </q-badge>
                                </div>

                                <div class="col-12 q-mt-md">
                                  <div class="col-12 row justify-between">
                                    <div
                                      class="text-bold q-mt-sm"
                                      style="font-size: 16px"
                                    >
                                      مدیران و همکاران سابق
                                    </div>

                                    <div>
                                      <q-btn
                                        dense
                                        flat
                                        color="primary"
                                        label="افزودن"
                                        icon="add_circle"
                                        class="q-pr-md"
                                      />
                                    </div>
                                  </div>
                                </div>

                                <div
                                  class="col-12 q-mt-sm q-mb-md row justify-center items-center q-ml-md"
                                >
                                  <q-item
                                    style="
                                      background-color: white;
                                      border-radius: 8px;
                                    "
                                    class="col-12 q-my-xs"
                                  >
                                    <q-item-section class="gt-sm" avatar>
                                      <div
                                        class="br-10 row q-py-sm"
                                        style="
                                          background-color: #f6f7f9 !important;
                                        "
                                      >
                                        <q-btn
                                          color="grey-7"
                                          flat
                                          dense
                                          class="col-12"
                                          icon="edit"
                                        />
                                        <q-btn
                                          color="grey-7"
                                          flat
                                          dense
                                          class="col-12"
                                          icon="delete "
                                        />
                                      </div>
                                    </q-item-section>

                                    <q-item-section class="q-px-md q-py-sm">
                                      <q-item-label class="text-bold"
                                        >عاشر قلیچ سید محمدی</q-item-label
                                      >

                                      <div class="q-my-sm">
                                        <span class="text-grey-7"
                                          >مدیر در aytronic</span
                                        >
                                      </div>

                                      <div class="text-grey-7">09112746075</div>
                                    </q-item-section>
                                  </q-item>

                                  <!-- xs And sm Screen Size Action Button  -->

                                  <div class="q-mt-md col-xs-6 col-sm-12 lt-md">
                                    <div class="text-center">
                                      <div
                                        class="br-10 row q-px-md"
                                        style="
                                          background-color: #f6f7f9 !important;
                                        "
                                      >
                                        <q-btn
                                          color="grey-7"
                                          flat
                                          dense
                                          class="col-xs-6 col-sm-12"
                                          icon="edit"
                                        />

                                        <q-btn
                                          color="grey-7"
                                          flat
                                          dense
                                          class="col-xs-6 col-sm-12"
                                          icon="delete "
                                        />
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>

                            <q-separator class="full-width q-mt-md" />

                            <!-- Courses -->

                            <div class="col-12 row">
                              <div class="q-px-sm">
                                <div class="row">
                                  <div class="col-12">
                                    <q-badge
                                      class="text-white text-bold"
                                      style="background-color: #45c26f"
                                    >
                                      100%
                                    </q-badge>
                                  </div>

                                  <div class="col-12 q-mt-md">
                                    <div class="col-12 row justify-between">
                                      <div
                                        class="text-bold q-mt-sm"
                                        style="font-size: 16px"
                                      >
                                        دوره‌های آموزشی
                                      </div>

                                      <div>
                                        <q-btn
                                          dense
                                          flat
                                          color="primary"
                                          label="افزودن"
                                          icon="add_circle"
                                          class="q-pr-md"
                                        />
                                      </div>
                                    </div>
                                  </div>

                                  <div
                                    class="col-12 q-mt-sm q-mb-md row justify-center items-center q-ml-md"
                                  >
                                    <q-item class="col-12 q-my-xs">
                                      <q-item-section class="gt-xs" avatar>
                                        <div
                                          class="br-10 row q-py-sm"
                                          style="
                                            background-color: #f6f7f9 !important;
                                          "
                                        >
                                          <q-btn
                                            color="grey-7"
                                            flat
                                            dense
                                            class="col-12"
                                            icon="edit"
                                          />
                                          <q-btn
                                            color="grey-7"
                                            flat
                                            dense
                                            class="col-12"
                                            icon="delete "
                                          />
                                        </div>
                                      </q-item-section>

                                      <q-item-section class="q-pa-md">
                                        <q-item-label class="text-bold"
                                          >دوره نهم سفر به ماه</q-item-label
                                        >

                                        <div class="q-pt-md q-pb-sm">
                                          <span class="text-grey-7"
                                            >عاشر قلیچ سید محمدی</span
                                          >
                                        </div>

                                        <div class="text-grey-7 q-pb-sm">
                                          طول دوره: 1 سال
                                        </div>

                                        <div class="text-grey-7">1400</div>
                                      </q-item-section>

                                      <q-item-section
                                        class="q-pa-sm row q-mr-lg gt-xs"
                                        side
                                      >
                                        <div class="text-bold text-black">
                                          The ninth period of travel to the moon
                                        </div>

                                        <div
                                          class="text-bold q-py-sm text-black"
                                        >
                                          Usher Qelich Seyed Muhammadi
                                        </div>

                                        <div class="text-grey-6 q-pb-sm">
                                          Duration: 1 year
                                        </div>

                                        <div class="text-grey-6">2021</div>
                                      </q-item-section>
                                    </q-item>

                                    <div class="lt-sm q-mt-md col-6">
                                      <div class="text-center">
                                        <div
                                          class="br-10 row q-px-md"
                                          style="
                                            background-color: #f6f7f9 !important;
                                          "
                                        >
                                          <q-btn
                                            color="grey-7"
                                            flat
                                            dense
                                            class="col-6"
                                            icon="edit"
                                          />

                                          <q-btn
                                            color="grey-7"
                                            flat
                                            dense
                                            class="col-6"
                                            icon="delete "
                                          />
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>

                            <q-separator class="full-width q-mt-md" />

                            <!-- Awards -->

                            <div class="col-12 row">
                              <div class="q-px-sm">
                                <div class="row">
                                  <div class="col-12">
                                    <q-badge
                                      class="text-white text-bold"
                                      style="background-color: #45c26f"
                                    >
                                      100%
                                    </q-badge>
                                  </div>

                                  <div class="col-12 q-mt-md">
                                    <div class="col-12 row justify-between">
                                      <div
                                        class="text-bold q-mt-sm"
                                        style="font-size: 16px"
                                      >
                                        جوایز و افتخارات
                                      </div>

                                      <div>
                                        <q-btn
                                          dense
                                          flat
                                          color="primary"
                                          label="افزودن"
                                          icon="add_circle"
                                          class="q-pr-md"
                                        />
                                      </div>
                                    </div>
                                  </div>

                                  <div
                                    class="col-12 q-mt-sm q-mb-md row justify-center items-center q-ml-md"
                                  >
                                    <q-item class="col-12 q-my-xs">
                                      <q-item-section class="gt-xs" avatar>
                                        <div
                                          class="br-10 row q-py-sm"
                                          style="
                                            background-color: #f6f7f9 !important;
                                          "
                                        >
                                          <q-btn
                                            color="grey-7"
                                            flat
                                            dense
                                            class="col-12"
                                            icon="edit"
                                          />
                                          <q-btn
                                            color="grey-7"
                                            flat
                                            dense
                                            class="col-12"
                                            icon="delete "
                                          />
                                        </div>
                                      </q-item-section>

                                      <q-item-section class="q-pa-md">
                                        <q-item-label class="text-bold"
                                          >نفر اول کشوری جشنواره نوجوان خوارزمی

                                          <div
                                            class="text-bold text-black q-mt-sm gt-xs"
                                          >
                                            The first national winner of the
                                            Khwarazmi Youth Festival
                                          </div>
                                        </q-item-label>

                                        <div class="q-pt-md q-pb-sm">
                                          <span class="text-grey-7">1401</span>
                                        </div>
                                      </q-item-section>

                                      <q-item-section
                                        class="q-pa-sm row q-mr-lg gt-md"
                                        side
                                      >
                                        <div class="text-bold text-black">
                                          The first national winner of the
                                          Khwarazmi Youth Festival
                                        </div>

                                        <div
                                          class="text-bold q-py-sm text-black"
                                        >
                                          2022
                                        </div>
                                      </q-item-section>
                                    </q-item>

                                    <div class="lt-sm q-mt-md col-6">
                                      <div class="text-center">
                                        <div
                                          class="br-10 row q-px-md"
                                          style="
                                            background-color: #f6f7f9 !important;
                                          "
                                        >
                                          <q-btn
                                            color="grey-7"
                                            flat
                                            dense
                                            class="col-6"
                                            icon="edit"
                                          />

                                          <q-btn
                                            color="grey-7"
                                            flat
                                            dense
                                            class="col-6"
                                            icon="delete "
                                          />
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>

                            <q-separator class="full-width q-mt-md" />

                            <!-- Academic Projects  -->

                            <div class="q-px-sm q-mb-md">
                              <div class="col-12">
                                <q-badge
                                  class="text-white text-bold"
                                  style="background-color: #eb4969"
                                >
                                  0%
                                </q-badge>
                              </div>

                              <div class="col-12 row justify-between">
                                <div
                                  class="text-bold q-mt-sm"
                                  style="font-size: 16px"
                                >
                                  پروژه‌ها و تجربیات آکادمیک
                                </div>

                                <div>
                                  <q-btn
                                    dense
                                    flat
                                    color="primary"
                                    label="افزودن"
                                    icon="add_circle"
                                    class="q-pr-md"
                                  />
                                </div>
                              </div>
                            </div>

                            <q-separator class="full-width q-mt-md" />

                            <!-- Books And Articles -->

                            <div class="q-px-sm q-mb-md">
                              <div class="col-12">
                                <q-badge
                                  class="text-white text-bold"
                                  style="background-color: #eb4969"
                                >
                                  0%
                                </q-badge>
                              </div>

                              <div class="col-12 row justify-between">
                                <div
                                  class="text-bold q-mt-sm"
                                  style="font-size: 16px"
                                >
                                  کتاب‌ها و مقالات
                                </div>

                                <div>
                                  <q-btn
                                    dense
                                    flat
                                    color="primary"
                                    label="افزودن"
                                    icon="add_circle"
                                    class="q-pr-md"
                                  />
                                </div>
                              </div>
                            </div>

                            <q-separator class="full-width q-mt-md" />

                            <!-- Voluntary Activities -->

                            <div class="q-px-sm q-pb-md">
                              <div class="col-12">
                                <q-badge
                                  class="text-white text-bold"
                                  style="background-color: #eb4969"
                                >
                                  0%
                                </q-badge>
                              </div>

                              <div class="col-12 row justify-between">
                                <div
                                  class="text-bold q-mt-sm"
                                  style="font-size: 16px"
                                >
                                  فعالیت‌های داوطلبانه
                                </div>

                                <div>
                                  <q-btn
                                    dense
                                    flat
                                    color="primary"
                                    label="افزودن"
                                    icon="add_circle"
                                    class="q-pr-md"
                                  />
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
            </div>

            <!-- Left/Bottom Content -->

            <div class="col-xs-12 col-sm-12 col-md-4 col-4 q-pl-md">
              <!-- Phone Number, Audio Introduction And Upload Personal Resume -->

              <div class="q-mt-sm">
                <div class="bg-white br-10">
                  <div class="row">
                    <!-- First Part -->

                    <div class="q-pa-md">
                      <div class="text-bold q-mt-sm" style="font-size: 16px">
                        اطلاعات تماس
                      </div>

                      <div class="row full-width q-mt-md">
                        <div class="col-12">
                          <div class="row justify-between">
                            <div class="col-8">
                              <div class="text-weight-thin text-grey-6">
                                آدرس ایمیل
                              </div>
                              <div class="text-bold">
                                moeensedaghaty86@gmail.com
                              </div>
                            </div>

                            <div class="col-2">
                              <q-btn flat color="grey-9" icon="edit" />
                            </div>
                          </div>
                        </div>

                        <div class="col-12 q-mt-md">
                          <div class="row justify-between">
                            <div class="col-8">
                              <div class="text-weight-thin text-grey-6">
                                شماره موبایل
                              </div>
                              <div class="text-bold">09379608155</div>
                            </div>

                            <div class="col-2">
                              <q-btn flat color="grey-9" icon="edit" />
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>

                    <q-separator
                      class="q-mt-md full-width"
                      style="height: 1px"
                    />

                    <div class="full-width">
                      <div class="bg-white br-10">
                        <div class="q-px-md">
                          <div class="row">
                            <div class="col-12">
                              <q-badge
                                class="text-white text-bold"
                                style="background-color: #eb4969"
                              >
                                0%
                              </q-badge>
                            </div>
                          </div>

                          <div class="full-width row justify-center q-py-md">
                            <div class="col-12 row justify-between">
                              <div
                                class="text-bold q-mt-sm"
                                style="font-size: 16px"
                              >
                                معرفی صوتی
                              </div>

                              <div>
                                <q-btn
                                  dense
                                  flat
                                  color="primary"
                                  label="افزودن"
                                  icon="add_circle"
                                  class="q-pr-md"
                                />
                              </div>
                            </div>

                            <div class="col-12 q-mt-md">
                              <div class="text-grey-7">
                                در این بخش، خود را در قالب یک صوت حداکثر دو
                                دقیقه ای به کارفرما معرفی کنید. در بسیاری از
                                موارد شناختی که این معرفی دو دقیقه ای برای
                                کارفرمایان ایجاد میکند
                                <span class="text-bold text-grey-8"
                                  >از رزومه شما بیشتر است.</span
                                >
                              </div>
                            </div>

                            <q-btn
                              class="q-mt-md text-primary"
                              style="font-size: 18px"
                              flat
                            >
                              <q-icon
                                style="border-radius: 50%"
                                class="text-white bg-primary q-pa-sm q-mr-md"
                                size="32px"
                                name="mic"
                              />

                              ضبط صدا
                            </q-btn>
                          </div>
                        </div>
                      </div>
                    </div>

                    <!-- Second Part -->

                    <q-separator
                      class="q-mt-md full-width"
                      style="height: 1px"
                    />

                    <div class="full-width">
                      <div class="bg-white br-10">
                        <div class="q-px-md">
                          <div class="row">
                            <div class="col-12">
                              <q-badge
                                class="text-white text-bold"
                                style="background-color: #eb4969"
                              >
                                0%
                              </q-badge>
                            </div>
                          </div>

                          <div class="full-width row justify-center q-py-md">
                            <div class="col-12 row justify-between">
                              <div
                                class="text-bold q-mt-sm"
                                style="font-size: 16px"
                              >
                                بارگذاری رزومه شخصی
                              </div>

                              <div>
                                <q-btn
                                  dense
                                  flat
                                  color="primary"
                                  label="افزودن"
                                  icon="add_circle"
                                  class="q-pr-md"
                                />
                              </div>
                            </div>

                            <div class="col-12 q-mt-md">
                              <div class="text-grey-7">
                                در این بخش با بارگذاری فایل رزومه خود نیز
                                می‌توانید به جذب بهتر خود کمک کنید. ایجاد میکند
                              </div>
                            </div>

                            <q-img
                              class="col-8 q-mt-md"
                              style="width: 191px; height: 181px"
                              src="https://jobvision.ir/assets/images/my-cv/cv-sample.svg"
                            />
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Some Of My Works -->

              <div class="q-mt-sm">
                <div class="bg-white br-10">
                  <div class="row">
                    <div class="full-width">
                      <div class="bg-white br-10">
                        <div class="q-px-md">
                          <div class="row">
                            <div class="col-12">
                              <q-badge
                                class="text-white text-bold"
                                style="background-color: #45c26f"
                              >
                                100%
                              </q-badge>
                            </div>
                          </div>

                          <!-- Declaration -->

                          <div class="full-width">
                            <div class="row justify-between">
                              <div
                                class="text-bold q-mt-sm"
                                style="font-size: 16px"
                              >
                                نمونه کارها
                              </div>

                              <div>
                                <q-btn
                                  dense
                                  flat
                                  color="primary"
                                  label="افزودن"
                                  icon="add_circle"
                                  class="q-pr-md"
                                />
                              </div>
                            </div>

                            <!-- Buttons And Links -->

                            <div class="row q-my-sm">
                              <div class="full-width">
                                <div
                                  dir="ltr"
                                  class="row justify-between q-pr-md"
                                >
                                  <div class="col-7 row">
                                    <q-btn
                                      class="col-2"
                                      color="primary"
                                      rounded
                                      icon="link"
                                      unelevated
                                    />

                                    <div class="text-primary col-6">
                                      <q-btn
                                        flat
                                        href="https://moeensedaqati.ir/"
                                        target="_blank"
                                      >
                                        <div style="font-size: 12px">
                                          https://moeensedaqati.ir/
                                        </div>
                                      </q-btn>
                                    </div>
                                  </div>

                                  <div class="col-5 row justify-end">
                                    <q-btn
                                      class="q-px-s"
                                      dense
                                      flat
                                      color="grey-8"
                                      icon="edit"
                                    />
                                    <q-btn
                                      class="q-px-s"
                                      dense
                                      flat
                                      color="grey-8"
                                      icon="delete"
                                    />
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
              </div>

              <!-- Salary Insight -->

              <div class="q-mt-sm">
                <div class="bg-white br-10">
                  <div class="row">
                    <div class="full-width">
                      <div
                        style="background-color: #eeeffe !important"
                        class="br-10 q-py-md"
                      >
                        <div class="q-px-md row">
                          <div class="full-width">
                            <div class="row justify-center text-center">
                              <q-img
                                class="col-12"
                                style="width: 200px; height: 70px"
                                src="https://jobvision.ir/assets/images/my-cv/salary-table.svg"
                              />

                              <div class="col-12">
                                <div
                                  class="text-bold q-mt-md"
                                  style="font-size: 12px"
                                >
                                  از حقوق دریافتی افراد در مشاغل مختلف باخبر
                                  شوید
                                </div>

                                <div class="q-mt-sm" style="font-size: 11px">
                                  حقوق و دستمزد مشاغل مختلف را بررسی کنید و
                                  تخمین دقیق‌تری از حقوق منصفانه خود داشته
                                  باشید.
                                </div>

                                <div class="q-mt-md">
                                  <q-btn
                                    flat
                                    color="primary"
                                    class="text-bold"
                                    label="ماشین حساب حقوق و دست مزد"
                                    icon-right="west"
                                  />
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

              <!-- Test Results -->

              <div class="q-mt-sm">
                <div class="bg-white br-10">
                  <div class="row q-py-md">
                    <div class="full-width">
                      <div class="bg-white br-10">
                        <div class="q-px-md">
                          <!-- Declaration -->

                          <div class="full-width">
                            <div class="row justify-between">
                              <div
                                class="text-bold q-mt-sm"
                                style="font-size: 16px"
                              >
                                نتایج آزمون‌ها
                              </div>
                            </div>
                          </div>

                          <div class="full-width q-mt-sm">
                            <div class="row justify-center">
                              <div class="col-12 row justify-between">
                                <div class="col-7 text-grey-7">
                                  <q-btn
                                    rounded
                                    disable
                                    dense
                                    color="grey-5"
                                    icon="done"
                                    class="q-mr-sm"
                                  />
                                  <span>Bar-On </span>
                                </div>

                                <div class="col-5 row justify-end">
                                  <q-btn
                                    flat
                                    color="primary"
                                    label="شرکت در آزمون"
                                  />
                                </div>
                              </div>

                              <div class="col-12 row justify-between q-mt-xs">
                                <div class="col-7 text-bold">
                                  <q-btn
                                    rounded
                                    disable
                                    dense
                                    color="primary"
                                    icon="done"
                                    class="q-mr-sm"
                                  />
                                  <span>MBTI </span>
                                </div>

                                <div class="col-5 row justify-end">
                                  <q-btn
                                    flat
                                    color="primary"
                                    label="مشاهده نتایج"
                                  />
                                </div>
                              </div>

                              <div class="col-12 row justify-between q-mt-xs">
                                <div class="col-7 text-grey-7">
                                  <q-btn
                                    rounded
                                    disable
                                    dense
                                    color="grey-5"
                                    icon="done"
                                    class="q-mr-sm"
                                  />
                                  <span>NEO </span>
                                </div>

                                <div class="col-5 row justify-end">
                                  <q-btn
                                    flat
                                    color="primary"
                                    label="شرکت در آزمون"
                                  />
                                </div>
                              </div>

                              <div class="col-12 row justify-between q-mt-xs">
                                <div class="col-7 text-grey-7">
                                  <q-btn
                                    rounded
                                    disable
                                    dense
                                    color="grey-5"
                                    icon="done"
                                    class="q-mr-sm"
                                  />
                                  <span>هوش های چندگانه</span>
                                </div>

                                <div class="col-5 row justify-end">
                                  <q-btn
                                    flat
                                    color="primary"
                                    label="شرکت در آزمون"
                                  />
                                </div>
                              </div>

                              <div class="col-12 row justify-between q-mt-xs">
                                <div class="col-7 text-grey-7">
                                  <q-btn
                                    rounded
                                    disable
                                    dense
                                    color="grey-5"
                                    icon="done"
                                    class="q-mr-sm"
                                  />
                                  <span>Holland </span>
                                </div>

                                <div class="col-5 row justify-end">
                                  <q-btn
                                    flat
                                    color="primary"
                                    label="شرکت در آزمون"
                                  />
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
            </div>
          </div>

          <div class="row" v-if="preferred == 'کارفرما'">
            <!-- Myself -->

            <div class="col-xs-12 col-sm-12 col-md-8 col-8 q-pr-md">
              <div class="full-width">
                <div class="bg-white br-10">
                  <div class="q-px-sm">
                    <div class="row">
                      <div class="col-12">
                        <q-badge
                          class="text-white text-bold"
                          style="background-color: #45c26f"
                        >
                          100%
                        </q-badge>
                      </div>
                    </div>

                    <div class="full-width">
                      <div class="row justify-between">
                        <div class="text-bold q-mt-sm" style="font-size: 16px">
                          درباره من
                        </div>
                      </div>
                    </div>

                    <div class="col-12 row">
                      <div class="q-mt-md q-mb-lg row justify-between">
                        <div class="col-12">
                          <div class="full-width row justify-between">
                            <div>
                              <q-item>
                                <q-item-section top avatar>
                                  <q-avatar
                                    size="64px"
                                    color="blue-grey-3"
                                    text-color="white"
                                  >
                                    <q-icon size="80px" name="person" />
                                  </q-avatar>
                                </q-item-section>

                                <q-item-section class="q-px-md">
                                  <q-item-label
                                    style="font-size: 16px"
                                    class="text-bold"
                                    >معین صداقتی</q-item-label
                                  >
                                  <q-item-label
                                    class="q-pt-md"
                                    caption
                                    lines="2"
                                  >
                                    دولوپر فول استک در شرکت آیترونیک
                                  </q-item-label>
                                </q-item-section>
                              </q-item>
                            </div>
                          </div>
                        </div>

                        <div class="row q-px-sm">
                          <div class="col-12 q-mt-md text-grey-8">
                            معین صداقتی متولد سال 1386/9/9. از 13 سالگی شروع به
                            یاد گیری برنامه نویسی کردم و از 15 سالگی به صورت جدی
                            برنامه نویسی میکنم.
                          </div>

                          <div dir="ltr" class="col-12 q-mt-lg text-grey-8">
                            Moeen Sedaqati born on 9/9/1386. I started learning
                            programming when I was 13 years old, and I started
                            programming seriously when I was 15 years old.
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="q-mt-sm">
                <div class="full-width">
                  <div class="bg-white br-10">
                    <div class="q-px-sm">
                      <div class="row">
                        <div class="col-12">
                          <q-badge
                            class="text-white text-bold"
                            style="background-color: #45c26f"
                          >
                            100%
                          </q-badge>
                        </div>

                        <div class="full-width">
                          <div class="row justify-between">
                            <div
                              class="text-bold q-mt-sm"
                              style="font-size: 16px"
                            >
                              اطلاعات اولیه
                            </div>
                          </div>
                        </div>

                        <div class="row justify-between q-mt-sm full-width">
                          <div class="col-12 row justify-between q-pb-sm">
                            <div class="col-5">
                              <div>
                                <div class="text-weight-thin text-grey-8">
                                  نام و نام خانوادگی
                                </div>
                                <div class="text-bold">معین صداقتی</div>
                              </div>

                              <div class="q-mt-md">
                                <div class="text-weight-thin text-grey-8">
                                  جنسیت
                                </div>
                                <div class="text-bold">مرد</div>
                              </div>

                              <div class="q-mt-md">
                                <div class="text-weight-thin text-grey-8">
                                  وضعیت تاهل
                                </div>
                                <div class="text-bold">مجرد</div>
                              </div>

                              <div class="q-mt-md">
                                <div class="text-weight-thin text-grey-8">
                                  وضعیت نظام وظیفه
                                </div>
                                <div class="text-bold">معافیت تحصیلی</div>
                              </div>

                              <div class="q-mt-md">
                                <div class="text-weight-thin text-grey-8">
                                  شهر محل سکونت
                                </div>
                                <div class="text-bold">گنبد کاووس</div>
                              </div>

                              <div class="q-mt-md">
                                <div class="text-weight-thin text-grey-8">
                                  محل سکونت
                                </div>
                                <div class="text-bold">
                                  خیابان بعثت غربی نرسیده به چهارراه فردوسی جنب
                                  یخچال سازی صوفی زاده
                                </div>
                              </div>

                              <div class="q-mt-md">
                                <div class="text-weight-thin text-grey-8">
                                  تاریخ تولد
                                </div>
                                <div class="text-bold">1386/09/09</div>
                              </div>

                              <div class="q-mt-md">
                                <div class="text-weight-thin text-grey-8">
                                  شماره ثابت
                                </div>
                                <div class="text-bold">33231884</div>
                              </div>

                              <div class="q-mt-md">
                                <div class="text-weight-thin text-grey-8">
                                  حقوق درخواستی
                                </div>
                                <div class="text-bold">8 - 6 میلیون تومان</div>
                              </div>

                              <div class="q-mt-md">
                                <div class="text-weight-thin text-grey-8">
                                  گروه شغلی مورد علاقه
                                </div>
                                <div class="text-bold">
                                  توسعه نرم افزار و برنامه نویسی
                                </div>
                              </div>
                            </div>

                            <div dir="ltr" class="col-5">
                              <div>
                                <div class="text-weight-thin text-grey-8">
                                  First and Last Name
                                </div>
                                <div class="text-bold">Moeen Sedaqati</div>
                              </div>

                              <div class="q-mt-md">
                                <div class="text-weight-thin text-grey-8">
                                  Gender
                                </div>
                                <div class="text-bold">Male</div>
                              </div>

                              <div class="q-mt-md">
                                <div class="text-weight-thin text-grey-8">
                                  Marital Status
                                </div>
                                <div class="text-bold">Single</div>
                              </div>

                              <div class="q-mt-md">
                                <div class="text-weight-thin text-grey-8">
                                  Military Service Status
                                </div>
                                <div class="text-bold">
                                  Educational Exemption
                                </div>
                              </div>

                              <div class="q-mt-md">
                                <div class="text-weight-thin text-grey-8">
                                  City
                                </div>
                                <div class="text-bold">Gonbad kavoos</div>
                              </div>

                              <div class="q-mt-md">
                                <div class="text-weight-thin text-grey-8">
                                  Region
                                </div>
                                <div class="text-bold">
                                  West Ba'ath St. has not reached the Ferdowsi
                                  intersection, next to Sufizadeh refrigerator
                                </div>
                              </div>

                              <div class="q-mt-md">
                                <div class="text-weight-thin text-grey-8">
                                  Date of Birth
                                </div>
                                <div class="text-bold">2007-11-30</div>
                              </div>

                              <div class="q-mt-md">
                                <div class="text-weight-thin text-grey-8">
                                  Phone Number
                                </div>
                                <div class="text-bold">33231884</div>
                              </div>

                              <div class="q-mt-md">
                                <div class="text-weight-thin text-grey-8">
                                  Expected Salary
                                </div>
                                <div class="text-bold">
                                  6 - 8 Million Tomans
                                </div>
                              </div>

                              <div class="q-mt-md">
                                <div class="text-weight-thin text-grey-8">
                                  Preferred Job Category
                                </div>
                                <div class="text-bold">
                                  IT - Software Development (Web,Moblie,…)
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

              <!-- Educational Records -->

              <div class="q-mt-sm">
                <div class="full-width">
                  <div class="bg-white br-10">
                    <div class="q-px-sm">
                      <div class="row">
                        <div class="col-12">
                          <q-badge
                            class="text-white text-bold"
                            style="background-color: #45c26f"
                          >
                            100%
                          </q-badge>
                        </div>

                        <div class="col-12 q-mt-md">
                          <div class="col-12 row justify-between">
                            <div
                              class="text-bold q-mt-sm"
                              style="font-size: 16px"
                            >
                              سوابق تحصیلی
                            </div>

                            <!-- <div>
                            <q-btn
                              dense
                              flat
                              color="primary"
                              label="افزودن"
                              icon="add_circle"
                              class="q-pr-md"
                            />
                          </div> -->
                          </div>
                        </div>

                        <div class="col-12 q-mt-md q-mb-sm">
                          <q-checkbox v-model="val" label="تحصیلات دانشگاهی" />
                        </div>

                        <div class="col-12 q-mb-md q-ml-md">
                          <q-radio
                            class="q-mb-xs full-width"
                            v-model="shape"
                            val="DY"
                            label="مدرک تحصیلی دیپلم دارم."
                          />
                          <q-radio
                            class="q-my-xs full-width"
                            v-model="shape"
                            val="DN"
                            label="مدرک تحصیلی زیر دیپلم دارم."
                          />
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Experience -->

              <div class="q-mt-sm">
                <div class="full-width">
                  <div class="bg-white br-10">
                    <div class="q-px-sm">
                      <div class="row">
                        <div class="col-12">
                          <q-badge
                            class="text-white text-bold"
                            style="background-color: #45c26f"
                          >
                            100%
                          </q-badge>
                        </div>

                        <div class="col-12 q-mt-md">
                          <div class="col-12 row justify-between">
                            <div
                              class="text-bold q-mt-sm"
                              style="font-size: 16px"
                            >
                              سوابق شغلی
                            </div>
                          </div>
                        </div>

                        <div
                          class="col-12 q-mt-md q-mb-md row justify-center items-center"
                        >
                          <q-item
                            style="background-color: white; border-radius: 8px"
                            class="col-12 q-my-xs"
                          >
                            <q-item-section class="q-pa-md">
                              <q-item-label
                                class="text-bold"
                                style="line-height: 2.2 !important"
                                >دولوپر فول استک در شرکت آیترونیک</q-item-label
                              >

                              <div class="q-py-md">
                                <span class="text-bold">آیترونیک</span>
                              </div>

                              <div class="text-grey-6">از تیر 1402 تاکنون</div>
                            </q-item-section>

                            <q-item-section
                              class="q-pa-sm row q-mr-md gt-xs"
                              side
                            >
                              <div class="text-bold text-black">
                                Full Stack Developer
                              </div>

                              <div class="text-bold q-my-md text-black">
                                Aytronic
                              </div>

                              <div class="text-grey-6">June 2023 - Present</div>
                            </q-item-section>
                          </q-item>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Langs -->

              <div class="q-mt-sm">
                <div class="full-width">
                  <div class="bg-white br-10">
                    <div class="q-px-sm">
                      <div class="row">
                        <div class="col-12">
                          <q-badge
                            class="text-white text-bold"
                            style="background-color: #45c26f"
                          >
                            100%
                          </q-badge>
                        </div>

                        <div class="col-12 q-mt-md">
                          <div class="col-12 row justify-between">
                            <div
                              class="text-bold q-mt-sm"
                              style="font-size: 16px"
                            >
                              زبان‌ها
                            </div>
                          </div>
                        </div>

                        <div class="col-12 row justify-between q-my-md">
                          <div
                            class="col-xs-10 col-sm-5 col-md-5 col-5 row items-center"
                          >
                            <div class="col-12">
                              <div class="row items-center q-mt-md">
                                <div
                                  class="text-white row q-px-sm q-py-xs br-10"
                                  style="
                                    background-color: #5c6573 !important;
                                    padding-top: 5px;
                                    padding-bottom: 5px;
                                  "
                                >
                                  <div class="text-bold q-ml-sm">انگلیسی</div>

                                  <q-separator
                                    color="white"
                                    class="q-mx-sm q-my-xs"
                                    vertical
                                  />

                                  <div>بالاتر از متوسط</div>
                                </div>
                              </div>
                            </div>

                            <div class="col-12">
                              <div class="row items-center q-mt-md">
                                <div
                                  class="text-white row q-px-sm q-py-xs br-10"
                                  style="
                                    background-color: #5c6573 !important;
                                    padding-top: 5px;
                                    padding-bottom: 5px;
                                  "
                                >
                                  <div class="text-bold q-ml-sm">فارسی</div>

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

                          <div class="col-5 row justify-end q-mr-md gt-xs">
                            <div>
                              <div class="row items-center q-mt-md">
                                <div
                                  class="text-white row q-px-sm q-py-xs br-10"
                                  style="
                                    background-color: #5c6573 !important;
                                    padding-top: 5px;
                                    padding-bottom: 5px;
                                  "
                                >
                                  <div>Upper Intermediate</div>

                                  <q-separator
                                    color="white"
                                    class="q-mx-sm q-my-xs"
                                    vertical
                                  />

                                  <div class="text-bold q-ml-sm">English</div>
                                </div>
                              </div>
                            </div>

                            <div>
                              <div class="row items-center q-mt-md">
                                <div
                                  class="text-white row q-px-sm q-py-xs br-10"
                                  style="
                                    background-color: #5c6573 !important;
                                    padding-top: 5px;
                                    padding-bottom: 5px;
                                  "
                                >
                                  <div>Advanced</div>

                                  <q-separator
                                    color="white"
                                    class="q-mx-sm q-my-xs"
                                    vertical
                                  />

                                  <div class="text-bold q-ml-sm">Persian</div>
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

              <!-- Skills -->

              <div class="q-mt-sm">
                <div class="full-width">
                  <div class="bg-white br-10">
                    <div class="q-px-sm">
                      <div class="row">
                        <div class="col-12">
                          <q-badge
                            class="text-white text-bold"
                            style="background-color: #45c26f"
                          >
                            100%
                          </q-badge>
                        </div>

                        <div class="col-12 q-mt-md">
                          <div class="col-12 row justify-between">
                            <div
                              class="text-bold q-mt-sm"
                              style="font-size: 16px"
                            >
                              مهارت های نرم افزاری
                            </div>
                          </div>
                        </div>

                        <div class="col-12 row q-my-sm">
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
                                <div
                                  class="text-bold q-ml-sm"
                                  style="font-size: 13px"
                                >
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
                                <div
                                  class="text-bold q-ml-sm"
                                  style="font-size: 13px"
                                >
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
                                <div
                                  class="text-bold q-ml-sm"
                                  style="font-size: 13px"
                                >
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
                    </div>
                  </div>
                </div>
              </div>

              <!-- Additional Skills -->

              <div class="q-mt-sm">
                <div class="full-width">
                  <div class="bg-white br-10">
                    <div class="q-px-sm">
                      <div class="row">
                        <div class="col-12">
                          <q-badge
                            class="text-white text-bold"
                            style="background-color: #45c26f"
                          >
                            100%
                          </q-badge>
                        </div>

                        <div class="col-12 q-mt-md">
                          <div class="col-12 row justify-between">
                            <div
                              class="text-bold q-mt-sm"
                              style="font-size: 16px"
                            >
                              مهارت های تکمیلی
                            </div>
                          </div>
                        </div>

                        <div class="full-width lt-md">
                          <div class="q-my-sm">
                            <div class="row">
                              <div class="col-12">
                                <div class="col-12 row items-center q-mt-sm">
                                  <div>
                                    <div
                                      class="text-white row q-px-sm q-pb-xs"
                                      style="
                                        padding-top: 5px;
                                        padding-bottom: 5px;
                                      "
                                    >
                                      <div
                                        class="text-grey-6"
                                        style="font-size: 13px"
                                      >
                                        مهارت‌ها در رزومه فارسی (6 مهارت)
                                      </div>
                                    </div>
                                  </div>
                                </div>

                                <!-- Skills -->

                                <div class="col-12 row items-center q-mt-sm">
                                  <div>
                                    <div
                                      class="text-white row q-px-sm q-py-xs br-8"
                                      style="
                                        background-color: #5c6573 !important;
                                        padding-top: 5px;
                                        padding-bottom: 5px;
                                      "
                                    >
                                      <div
                                        class="text-bold q-ml-sm"
                                        style="font-size: 13px"
                                      >
                                        برنامه نویسی فرانت اند
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>

                              <q-separator
                                class="q-mb-md q-mt-sm q-mx-xs full-width"
                              />

                              <div class="col-12 row">
                                <div
                                  class="col-12 row justify-end items-center q-mt-sm"
                                >
                                  <div>
                                    <div
                                      class="text-white row q-px-sm q-pb-xs q-mr-sm"
                                      style="
                                        padding-top: 5px;
                                        padding-bottom: 5px;
                                      "
                                    >
                                      <div
                                        class="text-grey-6"
                                        style="font-size: 13px"
                                      >
                                        Skills in English Resume (8 skills)
                                      </div>
                                    </div>
                                  </div>
                                </div>

                                <!-- Skills -->

                                <div
                                  class="col-12 row justify-end items-center q-mt-sm"
                                >
                                  <div>
                                    <div
                                      class="text-white row q-pl-sm q-py-xs br-8 q-mr-md"
                                      style="
                                        background-color: #5c6573 !important;
                                        padding-top: 5px;
                                        padding-bottom: 5px;
                                      "
                                    >
                                      <div
                                        class="text-bold q-mr-sm"
                                        style="font-size: 13px"
                                      >
                                        HTML
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>

                        <div class="full-width gt-sm">
                          <div class="q-my-lg">
                            <div class="row">
                              <div class="col">
                                <div class="col-12 row items-center q-mt-sm">
                                  <div>
                                    <div
                                      class="text-white row q-px-sm q-pb-xs"
                                      style="
                                        padding-top: 5px;
                                        padding-bottom: 5px;
                                      "
                                    >
                                      <div
                                        class="text-grey-6"
                                        style="font-size: 13px"
                                      >
                                        مهارت‌ها در رزومه فارسی (6 مهارت)
                                      </div>
                                    </div>
                                  </div>
                                </div>

                                <!-- Skills -->

                                <div class="col-12 row items-center q-mt-sm">
                                  <div>
                                    <div
                                      class="text-white row q-px-sm q-py-xs br-8"
                                      style="
                                        background-color: #5c6573 !important;
                                        padding-top: 5px;
                                        padding-bottom: 5px;
                                      "
                                    >
                                      <div
                                        class="text-bold q-ml-sm"
                                        style="font-size: 13px"
                                      >
                                        برنامه نویسی فرانت اند
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>

                              <q-separator class="q-my-xs q-mx-xs" vertical />

                              <div class="col row">
                                <div
                                  class="col-12 row justify-end items-center q-mt-sm"
                                >
                                  <div>
                                    <div
                                      class="text-white row q-px-sm q-pb-xs q-mr-sm"
                                      style="
                                        padding-top: 5px;
                                        padding-bottom: 5px;
                                      "
                                    >
                                      <div
                                        class="text-grey-6"
                                        style="font-size: 13px"
                                      >
                                        Skills in English Resume (8 skills)
                                      </div>
                                    </div>
                                  </div>
                                </div>

                                <!-- Skills -->

                                <div
                                  class="col-12 row justify-end items-center q-mt-sm"
                                >
                                  <div>
                                    <div
                                      class="text-white row q-pl-sm q-py-xs br-8 q-mr-md"
                                      style="
                                        background-color: #5c6573 !important;
                                        padding-top: 5px;
                                        padding-bottom: 5px;
                                      "
                                    >
                                      <div
                                        class="text-bold q-mr-sm"
                                        style="font-size: 13px"
                                      >
                                        HTML
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
                  </div>
                </div>
              </div>

              <!-- More -->

              <div class="q-mt-sm">
                <div class="full-width">
                  <div class="row">
                    <div class="col-12 row">
                      <div class="col-12 text-center q-my-md text-bold">
                        افزایش شانس استخدام شما تنها با تکمیل کردن اطلاعات
                        تکمیلی زیر
                      </div>

                      <!-- Content -->

                      <div class="full-width">
                        <div class="q-mt-sm">
                          <div class="bg-white br-10">
                            <!-- Partners -->

                            <div class="q-px-sm">
                              <div class="row">
                                <div class="col-12">
                                  <q-badge
                                    class="text-white text-bold"
                                    style="background-color: #45c26f"
                                  >
                                    100%
                                  </q-badge>
                                </div>

                                <div class="col-12 q-mt-md">
                                  <div class="col-12 row justify-between">
                                    <div
                                      class="text-bold q-mt-sm"
                                      style="font-size: 16px"
                                    >
                                      مدیران و همکاران سابق
                                    </div>
                                  </div>
                                </div>

                                <div
                                  class="col-12 q-mt-sm q-mb-md row justify-center items-center q-ml-md"
                                >
                                  <q-item
                                    style="
                                      background-color: white;
                                      border-radius: 8px;
                                    "
                                    class="col-12 q-my-xs"
                                  >
                                    <q-item-section class="q-px-md q-py-sm">
                                      <q-item-label class="text-bold"
                                        >عاشر قلیچ سید محمدی</q-item-label
                                      >

                                      <div class="q-my-sm">
                                        <span class="text-grey-7"
                                          >مدیر در aytronic</span
                                        >
                                      </div>

                                      <div class="text-grey-7">09112746075</div>
                                    </q-item-section>
                                  </q-item>
                                </div>
                              </div>
                            </div>

                            <q-separator class="full-width q-mt-md" />

                            <!-- Courses -->

                            <div class="full-width row">
                              <div class="q-px-sm full-width">
                                <div class="row">
                                  <div class="col-12">
                                    <q-badge
                                      class="text-white text-bold"
                                      style="background-color: #45c26f"
                                    >
                                      100%
                                    </q-badge>
                                  </div>

                                  <div class="col-12 q-mt-md">
                                    <div class="col-12 row justify-between">
                                      <div
                                        class="text-bold q-mt-sm"
                                        style="font-size: 16px"
                                      >
                                        دوره‌های آموزشی
                                      </div>
                                    </div>
                                  </div>

                                  <div
                                    class="col-12 q-mt-sm q-mb-md row justify-center items-center q-ml-md"
                                  >
                                    <q-item class="col-12 q-my-xs">
                                      <q-item-section class="q-pa-md">
                                        <q-item-label class="text-bold"
                                          >دوره نهم سفر به ماه</q-item-label
                                        >

                                        <div class="q-pt-md q-pb-sm">
                                          <span class="text-grey-7"
                                            >عاشر قلیچ سید محمدی</span
                                          >
                                        </div>

                                        <div class="text-grey-7 q-pb-sm">
                                          طول دوره: 1 سال
                                        </div>

                                        <div class="text-grey-7">1400</div>
                                      </q-item-section>

                                      <q-item-section
                                        class="q-pa-sm row q-mr-lg gt-xs"
                                        side
                                      >
                                        <div class="text-bold text-black">
                                          The ninth period of travel to the moon
                                        </div>

                                        <div
                                          class="text-bold q-py-sm text-black"
                                        >
                                          Usher Qelich Seyed Muhammadi
                                        </div>

                                        <div class="text-grey-6 q-pb-sm">
                                          Duration: 1 year
                                        </div>

                                        <div class="text-grey-6">2021</div>
                                      </q-item-section>
                                    </q-item>
                                  </div>
                                </div>
                              </div>
                            </div>

                            <q-separator class="full-width q-mt-md" />

                            <!-- Awards -->

                            <div class="col-12 row">
                              <div class="q-px-sm">
                                <div class="row">
                                  <div class="col-12">
                                    <q-badge
                                      class="text-white text-bold"
                                      style="background-color: #45c26f"
                                    >
                                      100%
                                    </q-badge>
                                  </div>

                                  <div class="col-12 q-mt-md">
                                    <div class="col-12 row justify-between">
                                      <div
                                        class="text-bold q-mt-sm"
                                        style="font-size: 16px"
                                      >
                                        جوایز و افتخارات
                                      </div>
                                    </div>
                                  </div>

                                  <div
                                    class="col-12 q-mt-sm q-mb-md row justify-center items-center q-ml-md"
                                  >
                                    <q-item class="col-12 q-my-xs">
                                      <q-item-section class="q-pa-md">
                                        <q-item-label class="text-bold"
                                          >نفر اول کشوری جشنواره نوجوان خوارزمی

                                          <div
                                            class="text-bold text-black q-mt-sm gt-xs"
                                          >
                                            The first national winner of the
                                            Khwarazmi Youth Festival
                                          </div>
                                        </q-item-label>

                                        <div class="q-pt-md q-pb-sm">
                                          <span class="text-grey-7">1401</span>
                                        </div>
                                      </q-item-section>

                                      <q-item-section
                                        class="q-pa-sm row q-mr-lg gt-md"
                                        side
                                      >
                                        <div class="text-bold text-black">
                                          The first national winner of the
                                          Khwarazmi Youth Festival
                                        </div>

                                        <div
                                          class="text-bold q-py-sm text-black"
                                        >
                                          2022
                                        </div>
                                      </q-item-section>
                                    </q-item>
                                  </div>
                                </div>
                              </div>
                            </div>

                            <q-separator class="full-width q-mt-md" />
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Left/Bottom Content -->

            <div class="col-xs-12 col-sm-12 col-md-4 col-4 q-pl-md">
              <!-- Phone Number, Audio Introduction And Upload Personal Resume -->

              <div class="q-mt-sm">
                <div class="bg-white br-10">
                  <div class="row">
                    <!-- First Part -->

                    <div class="q-pa-md">
                      <div class="text-bold q-mt-sm" style="font-size: 16px">
                        اطلاعات تماس
                      </div>

                      <div class="row full-width q-mt-md">
                        <div class="col-12">
                          <div class="row justify-between">
                            <div class="col-8">
                              <div class="text-weight-thin text-grey-6">
                                آدرس ایمیل
                              </div>
                              <div class="text-bold">
                                moeensedaghaty86@gmail.com
                              </div>
                            </div>

                            <div class="col-2">
                              <q-btn flat color="grey-9" icon="edit" />
                            </div>
                          </div>
                        </div>

                        <div class="col-12 q-mt-md">
                          <div class="row justify-between">
                            <div class="col-8">
                              <div class="text-weight-thin text-grey-6">
                                شماره موبایل
                              </div>
                              <div class="text-bold">09379608155</div>
                            </div>

                            <div class="col-2">
                              <q-btn flat color="grey-9" icon="edit" />
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>

                    <q-separator
                      class="q-mt-md full-width"
                      style="height: 1px"
                    />
                  </div>
                </div>
              </div>

              <!-- Some Of My Works -->

              <div class="q-mt-sm">
                <div class="bg-white br-10">
                  <div class="row">
                    <div class="full-width">
                      <div class="bg-white br-10">
                        <div class="q-px-md">
                          <div class="row">
                            <div class="col-12">
                              <q-badge
                                class="text-white text-bold"
                                style="background-color: #45c26f"
                              >
                                100%
                              </q-badge>
                            </div>
                          </div>

                          <!-- Declaration -->

                          <div class="full-width">
                            <div class="row justify-between">
                              <div
                                class="text-bold q-mt-sm"
                                style="font-size: 16px"
                              >
                                نمونه کارها
                              </div>

                              <div>
                                <q-btn
                                  dense
                                  flat
                                  color="primary"
                                  label="افزودن"
                                  icon="add_circle"
                                  class="q-pr-md"
                                />
                              </div>
                            </div>

                            <!-- Buttons And Links -->

                            <div class="row q-my-sm">
                              <div class="full-width">
                                <div
                                  dir="ltr"
                                  class="row justify-between q-pr-md"
                                >
                                  <div class="col-7 row">
                                    <q-btn
                                      class="col-2"
                                      color="primary"
                                      rounded
                                      icon="link"
                                      unelevated
                                    />

                                    <div class="text-primary col-6">
                                      <q-btn
                                        flat
                                        href="https://moeensedaqati.ir/"
                                        target="_blank"
                                      >
                                        <div style="font-size: 12px">
                                          https://moeensedaqati.ir/
                                        </div>
                                      </q-btn>
                                    </div>
                                  </div>

                                  <div class="col-5 row justify-end">
                                    <q-btn
                                      class="q-px-s"
                                      dense
                                      flat
                                      color="grey-8"
                                      icon="edit"
                                    />
                                    <q-btn
                                      class="q-px-s"
                                      dense
                                      flat
                                      color="grey-8"
                                      icon="delete"
                                    />
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
              </div>

              <!-- Salary Insight -->

              <div class="q-mt-sm">
                <div class="bg-white br-10">
                  <div class="row">
                    <div class="full-width">
                      <div
                        style="background-color: #eeeffe !important"
                        class="br-10 q-py-md"
                      >
                        <div class="q-px-md row">
                          <div class="full-width">
                            <div class="row justify-center text-center">
                              <q-img
                                class="col-12"
                                style="width: 200px; height: 70px"
                                src="https://jobvision.ir/assets/images/my-cv/salary-table.svg"
                              />

                              <div class="col-12">
                                <div
                                  class="text-bold q-mt-md"
                                  style="font-size: 12px"
                                >
                                  از حقوق دریافتی افراد در مشاغل مختلف باخبر
                                  شوید
                                </div>

                                <div class="q-mt-sm" style="font-size: 11px">
                                  حقوق و دستمزد مشاغل مختلف را بررسی کنید و
                                  تخمین دقیق‌تری از حقوق منصفانه خود داشته
                                  باشید.
                                </div>

                                <div class="q-mt-md">
                                  <q-btn
                                    flat
                                    color="primary"
                                    class="text-bold"
                                    label="ماشین حساب حقوق و دست مزد"
                                    icon-right="west"
                                  />
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

              <!-- Test Results -->

              <div class="q-mt-sm">
                <div class="bg-white br-10">
                  <div class="row q-py-md">
                    <div class="full-width">
                      <div class="bg-white br-10">
                        <div class="q-px-md">
                          <!-- Declaration -->

                          <div class="full-width">
                            <div class="row justify-between">
                              <div
                                class="text-bold q-mt-sm"
                                style="font-size: 16px"
                              >
                                نتایج آزمون‌ها
                              </div>
                            </div>
                          </div>

                          <div class="full-width q-mt-sm">
                            <div class="row justify-center">
                              <div class="col-12 row justify-between">
                                <div class="col-7 text-grey-7">
                                  <q-btn
                                    rounded
                                    disable
                                    dense
                                    color="grey-5"
                                    icon="done"
                                    class="q-mr-sm"
                                  />
                                  <span>Bar-On </span>
                                </div>

                                <div class="col-5 row justify-end">
                                  <q-btn
                                    flat
                                    color="primary"
                                    label="شرکت در آزمون"
                                  />
                                </div>
                              </div>

                              <div class="col-12 row justify-between q-mt-xs">
                                <div class="col-7 text-bold">
                                  <q-btn
                                    rounded
                                    disable
                                    dense
                                    color="primary"
                                    icon="done"
                                    class="q-mr-sm"
                                  />
                                  <span>MBTI </span>
                                </div>

                                <div class="col-5 row justify-end">
                                  <q-btn
                                    flat
                                    color="primary"
                                    label="مشاهده نتایج"
                                  />
                                </div>
                              </div>

                              <div class="col-12 row justify-between q-mt-xs">
                                <div class="col-7 text-grey-7">
                                  <q-btn
                                    rounded
                                    disable
                                    dense
                                    color="grey-5"
                                    icon="done"
                                    class="q-mr-sm"
                                  />
                                  <span>NEO </span>
                                </div>

                                <div class="col-5 row justify-end">
                                  <q-btn
                                    flat
                                    color="primary"
                                    label="شرکت در آزمون"
                                  />
                                </div>
                              </div>

                              <div class="col-12 row justify-between q-mt-xs">
                                <div class="col-7 text-grey-7">
                                  <q-btn
                                    rounded
                                    disable
                                    dense
                                    color="grey-5"
                                    icon="done"
                                    class="q-mr-sm"
                                  />
                                  <span>هوش های چندگانه</span>
                                </div>

                                <div class="col-5 row justify-end">
                                  <q-btn
                                    flat
                                    color="primary"
                                    label="شرکت در آزمون"
                                  />
                                </div>
                              </div>

                              <div class="col-12 row justify-between q-mt-xs">
                                <div class="col-7 text-grey-7">
                                  <q-btn
                                    rounded
                                    disable
                                    dense
                                    color="grey-5"
                                    icon="done"
                                    class="q-mr-sm"
                                  />
                                  <span>Holland </span>
                                </div>

                                <div class="col-5 row justify-end">
                                  <q-btn
                                    flat
                                    color="primary"
                                    label="شرکت در آزمون"
                                  />
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
    const editBTN = ref(false);
    const preferred = ref("کارفرما");
    const shape = ref();

    function editToggle() {
      if (editBTN.value == false) {
        editBTN.value = true;
      } else {
        editBTN.value = false;
      }
    }

    return {
      shape,
      editToggle,
      editBTN,
      preferred,
      model: ref(null),
      val: ref(true),
    };
  },
};
</script>

<style scoped>
[dir="rtl"] .q-item__section--side {
  padding: 0;
}

.q-tab__label {
  font-size: 12px;
  line-height: 1.715em;
  font-weight: 500;
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

.br-8 {
  border-radius: 8px;
}

.br-10 {
  border-radius: 10px !important;
}
</style>
