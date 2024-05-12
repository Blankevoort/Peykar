<template>
  <q-page>
    <!-- get number and email and gets checked -->
    
    <div v-if="enterEPhone">
      <q-page
        class="gt-sm row justify-center items-center"
        style="background-color: #f8f9fa"
      >
        <div
          class="bg-white q-pa-lg q-px-xl br-10 relative-position"
          style="border: 1px solid #dee2e6 !important; width: 400px"
        >
          <div class="q-my-lg">
            <div class="full-width text-center">
              <q-img
                style="height: 20px; width: 97.5px"
                src="https://account.jobvision.ir/images/job-vision-primary.svg"
              />

              <div class="full-width q-mt-lg text-h6">
                <span class="text-bold">ورود | ثبت‌نام </span>
                <span>کـارجـو</span>
              </div>
            </div>

            <div class="q-pt-md">
              <div class="full-width">
                <div class="text-grey-6 q-my-sm">ایمیل خود را وارد کنید</div>

                <q-input
                  outlined
                  v-model="emailPhone"
                  :rules="[(val) => !!val || 'Field is required']"
                />

                <div class="q-my-md">
                  <q-btn
                    class="full-width q-py-md"
                    color="primary"
                    @click="check"
                  >
                    <div class="q-py-sm">ادامه</div>
                  </q-btn>
                </div>
              </div>
            </div>

            <div
              class="q-my-sm"
              style="
                width: 100%;
                text-align: center;
                border-bottom: 1px solid #dcdcdc;
                line-height: 0.1em;
                margin: 25px 0;
              "
            >
              <span style="background: #fff; padding: 0 10px">یا</span>
            </div>

            <div class="q-pb-lg">
              <div
                class="row justify-center q-mb-md"
                style="border: 1px solid black; height: 44px; padding: 9px 24px"
              >
                <q-img
                  style="width: 18px; height: 18px"
                  src="https://account.jobvision.ir/images/login-register/google.svg"
                />

                <span class="q-px-sm">ادامه با گوگل</span>
              </div>

              <div
                class="row justify-center q-my-sm"
                style="border: 1px solid black; height: 44px; padding: 9px 24px"
              >
                <q-img
                  style="width: 18px; height: 18px"
                  src="https://account.jobvision.ir/images/login-register/linkedin.svg"
                />

                <span class="q-px-sm">ادامه لینکدین</span>
              </div>
            </div>

            <div class="absolute-bottom">
              <q-btn
                class="full-width q-py-md"
                color="grey-3"
                unelevated
                text-color="primary"
              >
                <div class="q-py-md">کارفرما هستید؟</div>
              </q-btn>
            </div>
          </div>
        </div>
      </q-page>

      <q-page class="lt-md">
        <div class="row justify-center items-center bg-white br-10 q-pa-lg">
          <div class="q-my-lg" style="width: 325px">
            <div class="full-width text-center">
              <q-img
                style="height: 20px; width: 97.5px"
                src="https://account.jobvision.ir/images/job-vision-primary.svg"
              />

              <div class="full-width q-mt-lg text-h6">
                <span class="text-bold">ورود | ثبت‌نام </span>
                <span>کـارجـو</span>
              </div>
            </div>

            <div class="q-pt-md">
              <div class="full-width">
                <div class="text-grey-6 q-my-sm">
                  شماره موبایل یا ایمیل خود را وارد کنید
                </div>

                <q-input
                  outlined
                  v-model="emailPhone"
                  :rules="[(val) => !!val || 'Field is required']"
                />

                <div class="q-my-md">
                  <q-btn
                    class="full-width q-py-md"
                    color="primary"
                    @click="check"
                  >
                    <div class="q-py-sm">ادامه</div>
                  </q-btn>
                </div>
              </div>
            </div>

            <div
              class="q-my-sm"
              style="
                width: 100%;
                text-align: center;
                border-bottom: 1px solid #dcdcdc;
                line-height: 0.1em;
                margin: 25px 0;
              "
            >
              <span style="background: #fff; padding: 0 10px">یا</span>
            </div>

            <div class="q-pb-lg">
              <div
                class="row justify-center q-mb-md"
                style="border: 1px solid black; height: 44px; padding: 9px 24px"
              >
                <q-img
                  style="width: 18px; height: 18px"
                  src="https://account.jobvision.ir/images/login-register/google.svg"
                />

                <span class="q-px-sm">ادامه با گوگل</span>
              </div>

              <div
                class="row justify-center q-my-sm"
                style="border: 1px solid black; height: 44px; padding: 9px 24px"
              >
                <q-img
                  style="width: 18px; height: 18px"
                  src="https://account.jobvision.ir/images/login-register/linkedin.svg"
                />

                <span class="q-px-sm">ادامه لینکدین</span>
              </div>
            </div>

            <div class="absolute-bottom">
              <q-btn
                class="full-width q-py-md"
                color="grey-3"
                unelevated
                text-color="primary"
              >
                <div class="q-py-md">کارفرما هستید؟</div>
              </q-btn>
            </div>
          </div>
        </div>
      </q-page>
    </div>

    <!-- enters password after check -->

    <div v-if="enterPassword">
      <q-page
        class="gt-sm row justify-center items-center"
        style="background-color: #f8f9fa"
      >
        <div
          class="bg-white q-pa-lg q-px-xl br-10 relative-position"
          style="border: 1px solid #dee2e6 !important; width: 400px"
        >
          <div class="q-my-lg">
            <div class="full-width text-center">
              <div class="relative-position">
                <q-img
                  style="height: 20px; width: 97.5px"
                  src="https://account.jobvision.ir/images/job-vision-primary.svg"
                />

                <div class="absolute-left">
                  <q-btn @click="enterPassword = false" flat color="grey-7">
                    <q-icon name="arrow_forward" />
                  </q-btn>
                </div>
              </div>

              <div class="full-width q-mt-lg">
                <div style="font-size: 1.17em !important">
                  رمز عبور خود را وارد کنید
                </div>

                <div class="q-my-md">ورود با {{ emailPhone }}</div>
              </div>
            </div>

            <div class="q-pt-md q-pb-lg">
              <div class="full-width">
                <div class="text-grey-6 q-my-sm">رمز عبور را وارد کنید</div>

                <q-input
                  v-model="password"
                  :rules="[
                    (val) => !!val || 'Field is required',
                    val && val.length > 6,
                  ]"
                  outlined
                  :type="isPwd ? 'password' : 'text'"
                >
                  <template v-slot:append>
                    <q-icon
                      :name="isPwd ? 'visibility' : 'visibility_off'"
                      class="cursor-pointer"
                      @click="isPwd = !isPwd"
                    />
                  </template>
                </q-input>

                <div class="q-my-sm">
                  <q-btn
                    flat
                    color="primary"
                    label="رمز عبور خود را فراموش کرده‌ام"
                  />
                </div>

                <div class="q-mb-md">
                  <q-btn
                    class="full-width q-py-md"
                    color="primary"
                    @click="login"
                  >
                    <div class="q-py-sm">ورود</div>
                  </q-btn>
                </div>
              </div>
            </div>

            <div class="absolute-bottom">
              <q-btn
                class="full-width q-py-md"
                color="grey-3"
                unelevated
                text-color="primary"
              >
                <div class="q-py-md">کارفرما هستید؟</div>
              </q-btn>
            </div>
          </div>
        </div>
      </q-page>

      <q-page class="lt-md">
        <div class="row justify-center items-center bg-white br-10 q-pa-lg">
          <div class="q-my-lg" style="width: 325px">
            <div class="full-width text-center">
              <div class="relative-position">
                <q-img
                  style="height: 20px; width: 97.5px"
                  src="https://account.jobvision.ir/images/job-vision-primary.svg"
                />

                <div class="absolute-left">
                  <q-btn @click="enterPassword = false" flat color="grey-7">
                    <q-icon name="arrow_forward" />
                  </q-btn>
                </div>
              </div>

              <div class="full-width q-mt-lg">
                <div style="font-size: 1.17em !important">
                  رمز عبور خود را وارد کنید
                </div>

                <div class="q-my-md">ورود با {{ emailPhone }}</div>
              </div>
            </div>

            <div class="q-pt-md q-pb-lg">
              <div class="full-width">
                <div class="text-grey-6 q-my-sm">رمز عبور را وارد کنید</div>

                <q-input
                  v-model="password"
                  :rules="[
                    (val) => !!val || 'Field is required',
                    val && val.length > 6,
                  ]"
                  outlined
                  :type="isPwd ? 'password' : 'text'"
                >
                  <template v-slot:append>
                    <q-icon
                      :name="isPwd ? 'visibility' : 'visibility_off'"
                      class="cursor-pointer"
                      @click="isPwd = !isPwd"
                    />
                  </template>
                </q-input>

                <div class="q-my-sm">
                  <q-btn
                    flat
                    color="primary"
                    label="رمز عبور خود را فراموش کرده‌ام"
                  />
                </div>

                <div class="q-mb-md">
                  <q-btn
                    class="full-width q-py-md"
                    color="primary"
                    @click="login"
                  >
                    <div class="q-py-sm">ورود</div>
                  </q-btn>
                </div>
              </div>
            </div>

            <div class="absolute-bottom">
              <q-btn
                class="full-width q-py-md"
                color="grey-3"
                unelevated
                text-color="primary"
              >
                <div class="q-py-md">کارفرما هستید؟</div>
              </q-btn>
            </div>
          </div>
        </div>
      </q-page>
    </div>

    <!-- enter email if user is logging in with phone -->

    <div v-if="registerPhoneSent">
      <q-page
        class="gt-sm row justify-center items-center"
        style="background-color: #f8f9fa"
      >
        <div
          class="bg-white q-pa-lg q-px-xl br-10 relative-position"
          style="border: 1px solid #dee2e6 !important; width: 400px"
        >
          <div class="q-my-lg">
            <div class="full-width text-center">
              <div class="relative-position">
                <q-img
                  style="height: 20px; width: 97.5px"
                  src="https://account.jobvision.ir/images/job-vision-primary.svg"
                />

                <div class="absolute-left">
                  <q-btn
                    @click="(enterEPhone = true), (registerPhoneSent = false)"
                    flat
                    color="grey-7"
                  >
                    <q-icon name="arrow_forward" />
                  </q-btn>
                </div>
              </div>

              <div class="full-width q-mt-lg">
                <div style="font-size: 1.17em !important">
                  ایمیل خود را وارد کنید
                </div>

                <div class="q-my-md">ورود با {{ emailPhone }}</div>
              </div>
            </div>

            <div class="q-pt-md q-pb-lg">
              <div class="full-width">
                <div class="text-grey-6 q-my-sm">ایمیل را وارد کنید</div>

                <q-input
                  outlined
                  v-model="email"
                  type="email"
                  :rules="[(val) => !!val || 'Field is required']"
                />

                <div class="q-my-lg" />

                <div class="q-mb-md">
                  <q-btn
                    class="full-width q-py-md"
                    color="primary"
                    @click="handleRegister"
                  >
                    <div class="q-py-sm">ادامه</div>
                  </q-btn>
                </div>
              </div>
            </div>

            <div class="absolute-bottom">
              <q-btn
                class="full-width q-py-md"
                color="grey-3"
                unelevated
                text-color="primary"
              >
                <div class="q-py-md">کارفرما هستید؟</div>
              </q-btn>
            </div>
          </div>
        </div>
      </q-page>

      <q-page class="lt-md">
        <div class="row justify-center items-center bg-white br-10 q-pa-lg">
          <div class="q-my-lg" style="width: 325px">
            <div class="full-width text-center">
              <div class="relative-position">
                <q-img
                  style="height: 20px; width: 97.5px"
                  src="https://account.jobvision.ir/images/job-vision-primary.svg"
                />

                <div class="absolute-left">
                  <q-btn
                    @click="(enterEPhone = true), (registerPhoneSent = false)"
                    flat
                    color="grey-7"
                  >
                    <q-icon name="arrow_forward" />
                  </q-btn>
                </div>
              </div>

              <div class="full-width q-mt-lg">
                <div style="font-size: 1.17em !important">
                  ایمیل خود را وارد کنید
                </div>

                <div class="q-my-md">ورود با {{ emailPhone }}</div>
              </div>
            </div>

            <div class="q-pt-md q-pb-lg">
              <div class="full-width">
                <div class="text-grey-6 q-my-sm">ایمیل را وارد کنید</div>

                <q-input
                  outlined
                  v-model="email"
                  type="email"
                  :rules="[(val) => !!val || 'Field is required']"
                />

                <div class="q-my-lg" />

                <div class="q-mb-md">
                  <q-btn
                    class="full-width q-py-md"
                    color="primary"
                    @click="handleRegister"
                  >
                    <div class="q-py-sm">ادامه</div>
                  </q-btn>
                </div>
              </div>
            </div>

            <div class="absolute-bottom">
              <q-btn
                class="full-width q-py-md"
                color="grey-3"
                unelevated
                text-color="primary"
              >
                <div class="q-py-md">کارفرما هستید؟</div>
              </q-btn>
            </div>
          </div>
        </div>
      </q-page>
    </div>

    <!-- enter phone if user is logging in with email -->

    <div v-if="registerEmailSent">
      <q-page
        class="gt-sm row justify-center items-center"
        style="background-color: #f8f9fa"
      >
        <div
          class="bg-white q-pa-lg q-px-xl br-10 relative-position"
          style="border: 1px solid #dee2e6 !important; width: 400px"
        >
          <div class="q-my-lg">
            <div class="full-width text-center">
              <div class="relative-position">
                <q-img
                  style="height: 20px; width: 97.5px"
                  src="https://account.jobvision.ir/images/job-vision-primary.svg"
                />

                <div class="absolute-left">
                  <q-btn @click="enterEPhone = true" flat color="grey-7">
                    <q-icon name="arrow_forward" />
                  </q-btn>
                </div>
              </div>

              <div class="full-width q-mt-lg">
                <div style="font-size: 1.17em !important">
                  شماره تلفن خود را وارد کنید
                </div>
              </div>
            </div>

            <div class="q-pt-md q-pb-lg">
              <div class="full-width">
                <div class="text-grey-6 q-my-sm">شماره تلفن را وارد کنید</div>

                <q-input
                  outlined
                  v-model="registerPhone"
                  type="tel"
                  :rules="[(val) => !!val || 'Field is required']"
                />

                <div class="q-my-lg" />

                <div class="q-mb-md">
                  <q-btn
                    class="full-width q-py-md"
                    color="primary"
                    @click="handleRegister"
                  >
                    <div class="q-py-sm">ادامه</div>
                  </q-btn>
                </div>
              </div>
            </div>

            <div class="absolute-bottom">
              <q-btn
                class="full-width q-py-md"
                color="grey-3"
                unelevated
                text-color="primary"
              >
                <div class="q-py-md">کارفرما هستید؟</div>
              </q-btn>
            </div>
          </div>
        </div>
      </q-page>

      <q-page class="lt-md">
        <div class="row justify-center items-center bg-white br-10 q-pa-lg">
          <div class="q-my-lg" style="width: 325px">
            <div class="full-width text-center">
              <div class="relative-position">
                <q-img
                  style="height: 20px; width: 97.5px"
                  src="https://account.jobvision.ir/images/job-vision-primary.svg"
                />

                <div class="absolute-left">
                  <q-btn @click="enterEPhone = true" flat color="grey-7">
                    <q-icon name="arrow_forward" />
                  </q-btn>
                </div>
              </div>

              <div class="full-width q-mt-lg">
                <div style="font-size: 1.17em !important">
                  شماره تلفن خود را وارد کنید
                </div>
              </div>
            </div>

            <div class="q-pt-md q-pb-lg">
              <div class="full-width">
                <div class="text-grey-6 q-my-sm">شماره تلفن را وارد کنید</div>

                <q-input
                  outlined
                  v-model="registerPhone"
                  type="tel"
                  :rules="[(val) => !!val || 'Field is required']"
                />

                <div class="q-my-lg" />

                <div class="q-mb-md">
                  <q-btn
                    class="full-width q-py-md"
                    color="primary"
                    @click="handleRegister"
                  >
                    <div class="q-py-sm">ادامه</div>
                  </q-btn>
                </div>
              </div>
            </div>

            <div class="absolute-bottom">
              <q-btn
                class="full-width q-py-md"
                color="grey-3"
                unelevated
                text-color="primary"
              >
                <div class="q-py-md">کارفرما هستید؟</div>
              </q-btn>
            </div>
          </div>
        </div>
      </q-page>
    </div>

    <!-- enter password for registration -->

    <div v-if="registerPhoneSaved">
      <q-page
        class="gt-sm row justify-center items-center"
        style="background-color: #f8f9fa"
      >
        <div
          class="bg-white q-pa-lg q-px-xl br-10 relative-position"
          style="border: 1px solid #dee2e6 !important; width: 400px"
        >
          <div class="q-my-lg">
            <div class="full-width text-center">
              <div class="relative-position">
                <q-img
                  style="height: 20px; width: 97.5px"
                  src="https://account.jobvision.ir/images/job-vision-primary.svg"
                />

                <div class="absolute-left">
                  <q-btn @click="enterEPhone = true" flat color="grey-7">
                    <q-icon name="arrow_forward" />
                  </q-btn>
                </div>
              </div>

              <div class="full-width q-mt-lg">
                <div style="font-size: 1.17em !important">
                  رمز خود را وارد کنید
                </div>
              </div>
            </div>

            <div class="q-pt-md q-pb-lg">
              <div class="full-width">
                <div class="text-grey-6 q-my-sm">رمز خود را وارد کنید</div>

                <q-input
                  v-model="registerPassword"
                  :rules="[(val) => !!val || 'Field is required']"
                  outlined
                  :type="isPwd ? 'password' : 'text'"
                >
                  <template v-slot:append>
                    <q-icon
                      :name="isPwd ? 'visibility' : 'visibility_off'"
                      class="cursor-pointer"
                      @click="isPwd = !isPwd"
                    />
                  </template>
                </q-input>

                <div class="q-my-lg" />

                <div class="q-mb-md">
                  <q-btn
                    class="full-width q-py-md"
                    color="primary"
                    @click="handleRegister"
                  >
                    <div class="q-py-sm">ادامه</div>
                  </q-btn>
                </div>
              </div>
            </div>

            <div class="absolute-bottom">
              <q-btn
                class="full-width q-py-md"
                color="grey-3"
                unelevated
                text-color="primary"
              >
                <div class="q-py-md">کارفرما هستید؟</div>
              </q-btn>
            </div>
          </div>
        </div>
      </q-page>

      <q-page class="lt-md">
        <div class="row justify-center items-center bg-white br-10 q-pa-lg">
          <div class="q-my-lg" style="width: 325px">
            <div class="full-width text-center">
              <div class="relative-position">
                <q-img
                  style="height: 20px; width: 97.5px"
                  src="https://account.jobvision.ir/images/job-vision-primary.svg"
                />

                <div class="absolute-left">
                  <q-btn @click="enterEPhone = true" flat color="grey-7">
                    <q-icon name="arrow_forward" />
                  </q-btn>
                </div>
              </div>

              <div class="full-width q-mt-lg">
                <div style="font-size: 1.17em !important">
                  رمز عبور خود را وارد کنید
                </div>
              </div>
            </div>

            <div class="q-pt-md q-pb-lg">
              <div class="full-width">
                <div class="text-grey-6 q-my-sm">رمز عبور را وارد کنید</div>

                <q-input
                  v-model="registerPassword"
                  :rules="[(val) => !!val || 'Field is required']"
                  outlined
                  :type="isPwd ? 'password' : 'text'"
                >
                  <template v-slot:append>
                    <q-icon
                      :name="isPwd ? 'visibility' : 'visibility_off'"
                      class="cursor-pointer"
                      @click="isPwd = !isPwd"
                    />
                  </template>
                </q-input>

                <div class="q-my-lg" />

                <div class="q-mb-md">
                  <q-btn
                    class="full-width q-py-md"
                    color="primary"
                    @click="handleRegister"
                  >
                    <div class="q-py-sm">ادامه</div>
                  </q-btn>
                </div>
              </div>
            </div>

            <div class="absolute-bottom">
              <q-btn
                class="full-width q-py-md"
                color="grey-3"
                unelevated
                text-color="primary"
              >
                <div class="q-py-md">کارفرما هستید؟</div>
              </q-btn>
            </div>
          </div>
        </div>
      </q-page>
    </div>

    <!-- confirm you email for registration -->

    <div v-if="registerPasswordSaved">
      <q-page
        class="gt-sm row justify-center items-center"
        style="background-color: #f8f9fa"
      >
        <div
          class="bg-white q-pa-lg q-px-xl br-10 relative-position"
          style="border: 1px solid #dee2e6 !important; width: 400px"
        >
          <div class="q-my-lg">
            <div class="full-width text-center">
              <div class="relative-position">
                <q-img
                  style="height: 20px; width: 97.5px"
                  src="https://account.jobvision.ir/images/job-vision-primary.svg"
                />

                <div class="absolute-left">
                  <q-btn @click="enterEPhone = true" flat color="grey-7">
                    <q-icon name="arrow_forward" />
                  </q-btn>
                </div>
              </div>

              <div class="full-width q-mt-lg">
                <div style="font-size: 1.17em !important">
                  ایمیل خود را تایید کنید
                </div>
              </div>
            </div>

            <div class="q-pt-md q-pb-lg">
              <div class="full-width">
                <div class="text-grey-6 q-my-sm">ایمیل خود را تایید کنید</div>

                <q-input
                  outlined
                  v-model="registerEmailConfirm"
                  :rules="[(val) => !!val || 'Field is required']"
                />

                <div class="q-my-lg" />

                <div class="q-mb-md">
                  <q-btn
                    class="full-width q-py-md"
                    color="primary"
                    @click="register"
                  >
                    <div class="q-py-sm">ساخت</div>
                  </q-btn>
                </div>
              </div>
            </div>

            <div class="absolute-bottom">
              <q-btn
                class="full-width q-py-md"
                color="grey-3"
                unelevated
                text-color="primary"
              >
                <div class="q-py-md">کارفرما هستید؟</div>
              </q-btn>
            </div>
          </div>
        </div>
      </q-page>

      <q-page class="lt-md">
        <div class="row justify-center items-center bg-white br-10 q-pa-lg">
          <div class="q-my-lg" style="width: 325px">
            <div class="full-width text-center">
              <div class="relative-position">
                <q-img
                  style="height: 20px; width: 97.5px"
                  src="https://account.jobvision.ir/images/job-vision-primary.svg"
                />

                <div class="absolute-left">
                  <q-btn @click="enterEPhone = true" flat color="grey-7">
                    <q-icon name="arrow_forward" />
                  </q-btn>
                </div>
              </div>

              <div class="full-width q-mt-lg">
                <div style="font-size: 1.17em !important">
                  ایمیل خود را تایید کنید
                </div>
              </div>
            </div>

            <div class="q-pt-md q-pb-lg">
              <div class="full-width">
                <div class="text-grey-6 q-my-sm">ایمیل خود را تایید کنید</div>

                <q-input
                  outlined
                  v-model="registerEmailConfirm"
                  :rules="[(val) => !!val || 'Field is required']"
                />

                <div class="q-my-lg" />

                <div class="q-mb-md">
                  <q-btn
                    class="full-width q-py-md"
                    color="primary"
                    @click="register"
                  >
                    <div class="q-py-sm">ساخت</div>
                  </q-btn>
                </div>
              </div>
            </div>

            <div class="absolute-bottom">
              <q-btn
                class="full-width q-py-md"
                color="grey-3"
                unelevated
                text-color="primary"
              >
                <div class="q-py-md">کارفرما هستید؟</div>
              </q-btn>
            </div>
          </div>
        </div>
      </q-page>
    </div>
  </q-page>
</template>

<script>
import { ref } from "vue";
import { useQuasar } from "quasar";
import { useRouter } from "vue-router";

import { api } from "src/boot/axios";

export default {
  setup() {
    // general
    const error = ref();
    const phone = ref();
    const email = ref();
    const q = useQuasar();
    const password = ref();
    const emailPhone = ref();
    const router = useRouter();
    const checkResult = ref(null);
    const usingPhone = ref(false);
    const usingEmail = ref(false);
    const DuplicateResult = ref(null);

    const isPwd = ref(true);
    const isLoading = ref(true);
    const enterEPhone = ref(true);
    const enterPassword = ref(false);

    // Register
    const registerPhone = ref();
    const registerPassword = ref();
    const registerEmailConfirm = ref();

    // Views

    const registerEmailSent = ref(false);
    const registerPhoneSent = ref(false);
    const registerEmailSaved = ref(false);
    const registerPhoneSaved = ref(false);
    const registerPasswordSaved = ref(false);

    function errorHandler(err) {
      if (err.response) {
        if (err.response.status === 400) {
          error.value = "با اطلاعات وارد شده نمیتوان وارد شد.";
        } else if (err.response.status === 401) {
          error.value = "اطلاعات وارد شده معتبر نیستند.";
        } else if (err.response.status === 403) {
          error.value = "دسترسی غیرمجاز.";
        } else {
          error.value = "خطای سمت سرور: درخواست نامعتبر.";
        }
      } else if (err.request) {
        error.value = "خطای سمت سرور: درخواست ارسال نشد.";
      } else {
        error.value = "خطای سمت سرور: خطای نامشخص رخ داد.";
      }
    }

    function check() {
      api
        .post("/api/check", {
          emailPhone: emailPhone.value,
        })
        .then((r) => {
          if (r.data) {
            checkResult.value = r.data.status;
            if (r.data.phone == "") {
              enterEPhone.value = false;
              usingPhone.value = true;
            } else if (r.data.email == "") {
              enterEPhone.value = false;
              usingEmail.value = true;
            }
            perform();
          }
        })
        .catch((err) => {
          errorHandler(err);
        });
    }

    function perform() {
      if (usingPhone.value == true) {
        if (checkResult.value == "login") {
          enterPassword.value = true;
        } else if (checkResult.value == "register") {
          enterEPhone.value = false;
          registerPhoneSent.value = true;
        }
      } else if (usingEmail.value == true) {
        if (checkResult.value == "login") {
          enterPassword.value = true;
        } else if (checkResult.value == "register") {
          registerEmailSent.value = true;
        }
      }
    }

    function login() {
      api
        .post("/api/login", {
          emailPhone: emailPhone.value,
          password: password.value,
        })
        .then((r) => {
          if (r.data) {
            q.cookies.set("token", r.data.data.token, { expires: 360 });
          }
        })
        .then((r) => {
          api.get("/api/user").then((r) => {
            router.push("/");
          });
        })
        .catch((err) => {
          errorHandler(err);
        });
    }

    // Register Functions

    // moeensedaghaty86@gmail.com
    // Moeen576786
    // enter email if user is logging in with phone
    // registerPhoneSent

    // enter phone if user is logging in with email
    // registerEmailSent

    // enter password for registration
    // registerPhoneSaved

    // confirm you email for registration
    // registerPasswordSaved

    function checkDuplicate() {
      api
        .post("/api/check-duplicate", {
          emailPhone: emailPhone.value,
        })
        .then((r) => {
          if (r.data) {
            if (usingPhone.value == true) {
              if (r.data.status === 409) {
                if (r.data.email == "") {
                  registerPhoneSent.value = true;
                  registerEmailSent.value = false;
                }
              } else if (r.data.status == "ok") {
                registerPhoneSaved.value = true;
              }
            } else {
              if (r.data.status === 409) {
                if (r.data.phone == "") {
                  registerEmailSent.value = true;
                  registerPhoneSent.value = false;
                }
              } else if (r.data.status == "ok") {
                registerPhoneSaved.value = true;
              }
            }
          }
        })
        .catch((err) => {
          errorHandler(err);
        });
    }

    function handleRegister() {
      if (usingPhone.value == true) {
        if (registerPhoneSent.value == true) {
          checkDuplicate();
          registerPhoneSent.value = false;
        } else if (registerPhoneSaved.value == true) {
          registerPhoneSaved.value = false;
          registerPasswordSaved.value = true;
        } else if (registerPasswordSaved.value == true) {
          confirmEmail();
          registerPasswordSaved.value = false;
        }
      } else {
        if (registerEmailSent.value == true) {
          checkDuplicate();
          registerEmailSent.value = false;
        } else if (registerPhoneSaved.value == true) {
          registerPhoneSaved.value = false;
          registerPasswordSaved.value = true;
        } else if (registerPasswordSaved.value == true) {
          confirmEmail();
          registerPasswordSaved.value = false;
        }
      }
    }

    function confirmEmail() {
      var matching;
      var email;

      if (email.value) {
        email = email.value;
      } else if (emailPhone.value) {
        email = emailPhone.value;
      }

      if (email == registerEmailConfirm.value) {
        matching = true;
      }

      console.log(email);
      console.log(matching);
    }

    // email
    // emailPhone
    // registerEmailConfirm

    function register() {
      api
        .post("/api/register", {
          phone: registerPhone.value,
          email: emailPhone.value,
          email_confirmation: registerEmailConfirm.value,
          password: registerPassword.value,
        })
        .then((r) => {
          if (r.data) {
            q.cookies.set("token", r.data.data.token, { expires: 360 });
            router.push("/");
          }
        })
        .catch((err) => {
          errorHandler(err);
        });
    }

    return {
      // Other

      isPwd,
      check,
      login,
      error,
      phone,
      email,
      perform,
      password,
      register,
      isLoading,
      usingPhone,
      usingEmail,
      emailPhone,
      enterEPhone,
      checkResult,
      errorHandler,
      enterPassword,
      checkDuplicate,
      DuplicateResult,

      // Register

      confirmEmail,
      registerPhone,
      handleRegister,
      registerPassword,
      registerPhoneSent,
      registerEmailSent,
      registerEmailSaved,
      registerPhoneSaved,
      registerEmailConfirm,
      registerPasswordSaved,
    };
  },
};
</script>

<style scoped>
.q-btn {
  padding: 0;
}
</style>
