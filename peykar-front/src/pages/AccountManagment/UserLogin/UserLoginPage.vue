<template>
  <div v-if="enterEmail">
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

              <q-input outlined v-model="email" />

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

              <q-input outlined v-model="email" />

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

  <div v-if="emailSent">
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
                <q-btn @click="emailSent = false" flat color="grey-7">
                  <q-icon name="arrow_forward" />
                </q-btn>
              </div>
            </div>

            <div class="full-width q-mt-lg">
              <div style="font-size: 1.17em !important">
                رمز عبور خود را وارد کنید
              </div>

              <div class="q-my-md">ورود با moeensedaghaty86@gmail.com</div>
            </div>
          </div>

          <div class="q-pt-md q-pb-lg">
            <div class="full-width">
              <div class="text-grey-6 q-my-sm">رمز عبور را وارد کنید</div>

              <q-input
                v-model="password"
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
                <q-btn @click="emailSent = false" flat color="grey-7">
                  <q-icon name="arrow_forward" />
                </q-btn>
              </div>
            </div>

            <div class="full-width q-mt-lg">
              <div style="font-size: 1.17em !important">
                رمز عبور خود را وارد کنید
              </div>

              <div class="q-my-md">ورود با {{ userEmail }}</div>
            </div>
          </div>

          <div class="q-pt-md q-pb-lg">
            <div class="full-width">
              <div class="text-grey-6 q-my-sm">رمز عبور را وارد کنید</div>

              <q-input
                v-model="password"
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

  <!-- moeensedaghaty71@gmail.com -->

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
                <q-btn @click="enterEmail = true" flat color="grey-7">
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

              <q-input outlined v-model="registerPhone" />

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
                <q-btn @click="enterEmail = true" flat color="grey-7">
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

              <q-input outlined v-model="registerPhone" />

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
</template>

<script>
import { ref } from "vue";
import { useQuasar } from "quasar";
import { useRouter } from "vue-router";

import { api } from "src/boot/axios";

export default {
  setup() {
    // other
    const error = ref();
    const email = ref("moeensedaghaty71@gmail.com");
    const q = useQuasar();
    const password = ref();
    const userEmail = ref();
    const router = useRouter();
    const checkResult = ref(null);

    const isPwd = ref(true);
    const isLoading = ref(true);
    const emailSent = ref(false);
    const enterEmail = ref(true);

    // Register
    const registerEmail = ref();
    const registerPhone = ref();
    const registerPassword = ref();
    const registerEmailConfirm = ref();

    // Views

    const registerEmailSent = ref(false);
    const registerPhoneSaved = ref(false);
    const registerPasswordSaved = ref(false);
    const registerEmailConfirmed = ref(false);

    function check() {
      api
        .post("/api/check", {
          email: email.value,
        })
        .then((r) => {
          if (r.data) {
            checkResult.value = r.data.status;
            q.cookies.set("email", r.data.email);
            perform();
          }
        })
        .catch((err) => {
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
        });
    }

    function login() {
      api
        .post("/api/login", {
          email: userEmail.value,
          password: password.value,
        })
        .then((r) => {
          if (r.data) {
            q.cookies.set("token", r.data.data.token, { expires: 360 });
            router.push("/");
          }
        })
        .catch((err) => {
          if (err.response) {
            if (err.response.status === 400) {
              error.value = "با اطلاعات وارد شده نمیتوان وارد شد.";
              console.log(error.value);
            } else if (err.response.status === 401) {
              error.value = "اطلاعات وارد شده معتبر نیستند.";
              console.log(error.value);
            } else if (err.response.status === 403) {
              error.value = "دسترسی غیرمجاز.";
              console.log(error.value);
            } else {
              error.value = "خطای سمت سرور: درخواست نامعتبر.";
              console.log(error.value);
            }
          } else if (err.request) {
            error.value = "خطای سمت سرور: درخواست ارسال نشد.";
            console.log(error.value);
          } else {
            error.value = "خطای سمت سرور: خطای نامشخص رخ داد.";
            console.log(error.value);
          }
        });
    }

    function perform() {
      if (checkResult.value == "login") {
        enterEmail.value = true;
        userEmail.value = q.cookies.get("email");
        q.cookies.remove("email");
      } else {
        registerEmailSent.value = true;
        enterEmail.value = false;
      }
    }

    // Register Functions

    function handleRegister() {
      if (registerEmailSent.value == true) {
        registerEmailSent.value = false;
        registerPhoneSaved.value = true;
      } else if (registerPhoneSaved.value == true) {
        registerEmailSent.value = false;
        registerPhoneSaved.value = true;
      } else if (registerPasswordSaved.value == true) {
        registerPhoneSaved.value = false;
        registerPasswordSaved.value = true;
      } else if (registerEmailConfirmed.value == true) {
        registerPasswordSaved.value = false;
      } else {
        api
          .post("/api/register", {
            phone: registerPhone.value,
            email: registerEmail.value,
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
            if (err.response) {
              destroy.value = true;
              if (err.response.status === 400) {
                error.value = "با اطلاعات وارد شده نمیتوان وارد شد.";
                triggerError();
              } else if (err.response.status === 401) {
                error.value = "اطلاعات وارد شده معتبر نیستند.";
                triggerError();
              } else if (err.response.status === 403) {
                error.value = "دسترسی غیرمجاز.";
                triggerError();
              } else {
                error.value = "خطای سمت سرور: درخواست نامعتبر.";
                triggerError();
              }
            } else if (err.request) {
              error.value = "خطای سمت سرور: درخواست ارسال نشد.";
              triggerError();
            } else {
              error.value = "خطای سمت سرور: خطای نامشخص رخ داد.";
              triggerError();
            }
          });
      }
    }

    return {
      // Other
      isPwd,
      email,
      check,
      login,
      error,
      perform,
      password,
      userEmail,
      emailSent,
      isLoading,
      enterEmail,
      checkResult,
      registerEmail,
      // Register
      registerPhone,
      handleRegister,
      registerPassword,
      registerEmailSent,
      registerPhoneSaved,
      registerEmailConfirm,
      registerPasswordSaved,
      registerEmailConfirmed,
    };
  },
};
</script>

<style scoped>
.q-btn {
  padding: 0;
}
</style>
