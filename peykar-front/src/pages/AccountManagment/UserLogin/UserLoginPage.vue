<template>
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
                <q-btn class="full-width q-py-md" color="primary">
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
                <q-btn class="full-width q-py-md" color="primary">
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

  <div v-else>
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
              <div class="text-grey-6 q-my-sm">
                شماره موبایل یا ایمیل خود را وارد کنید
              </div>

              <q-input outlined v-model="email" />

              <div class="q-my-md">
                <q-btn class="full-width q-py-md" color="primary">
                  <div class="q-py-sm">ورود</div>
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
                <q-btn class="full-width q-py-md" color="primary">
                  <div class="q-py-sm">ورود</div>
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
</template>

<script>
import { ref } from "vue";

export default {
  setup() {
    const email = ref();

    const isPwd = ref(true);
    const emailSent = ref(true);
    const isLoading = ref(true);

    return {
      isPwd,
      email,
      emailSent,
      isLoading,
    };
  },
};
</script>

<style scoped>
.q-btn {
  padding: 0;
}
</style>
