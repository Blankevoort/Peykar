export const formConfigs = {
  about: {
    title: "درباره من",
    customContent: true,
    component: () => import("./CustomContents/AboutCustomContent.vue"),
    fields: [
      {
        type: "input",
        name: "name",
        label: "عنوان شغلی نمایشی",
        tip: "در اینجا می توانید عنوان شغلی نمایشی خود برای کارفرما را وارد کنید.",
      },
      { type: "input", name: "email", label: "آدرس پروفایل لینکدین شما" },
      {
        type: "textarea",
        name: "description",
        label: "چند جمله درباره خود بنویسید",
      },
    ],
  },
  // basicInfo: {
  //   title: "اطلاعات اولیه",
  //   customContent: false,
  //   fields: [
  //     {
  //       type: "input",
  //       name: "name",
  //       label: "نام",
  //     },
  //     {
  //       type: "input",
  //       name: "name",
  //       label: "نام خانوادگی",
  //     },
  //     {
  //       type: "select-tab",
  //       name: "name",
  //       label: "جنسیت",
  //     },
  //     {
  //       type: "select-tab",
  //       name: "name",
  //       label: "وضعیت تاهل",
  //     },
  //     {
  //       type: "select",
  //       name: "name",
  //       label: "وضعیت نظام وظیفه",
  //     },
  //     {
  //       type: "select-custom",
  //       name: "name",
  //       label: "شهر محل سکونت",
  //     },
  //     {
  //       type: "select",
  //       name: "name",
  //       label: "محله",
  //       primaryTip:
  //         "وارد کردن محل سکونت دقیق به ما کمک می کند که پیشنهادهای شغلی نزدیک تر به محل زندگی شما را با اولویت بالاتری به شما پیشنهاد دهیم",
  //     },
  //     {
  //       type: "select-age",
  //       name: "name",
  //       label: "تاریخ تولد",
  //     },
  //     {
  //       type: "input",
  //       name: "name",
  //       label: "شماره تلفن ثابت (اختیاری)",
  //       primaryTip:
  //         "در صورتی که کارفرما بخواهد با شما تماس بگیرد و موبایل شما در دسترس نباشد این شماره تلفن ثابت به شما کمک می کند که تماس کارفرما را از دست ندهید",
  //     },
  //     {
  //       type: "select",
  //       name: "name",
  //       label: "حقوق درخواستی",
  //       primaryTip:
  //         "منظور از حقوق درخواستی مجموع کل دریافتی های شما در هر ماه است",
  //     },
  //     {
  //       type: "select-custom",
  //       name: "name",
  //       label: "علاقمند به استخدام در کدام حوزه شغلی هستید؟ (حداکثر ۳ مورد)",
  //       primaryTip:
  //         "شما با وارد کردن گروه های شغلی مورد علاقه خود می توانید آگهی های شغلی مرتبط با این گروه ها را در قالب ایمیل دریافت کنید.",
  //     },
  //     {
  //       type: "checkbox",
  //       name: "name",
  //       label: "اتباع خارجی هستم",
  //       questionOnTrue: [(title = "ملیت"), (options = [])],
  //     },
  //     {
  //       type: "checkbox",
  //       name: "name",
  //       label: "دارای معلولیت هستم",
  //       questionOnTrue: [(title = "نوع معلولیت"), (options = [])],
  //     },
  //   ],
  // },
  // educationalRecords: {
  //   title: "سابقه تحصیلی",
  //   customContent: false,
  //   fields: [
  //     {
  //       type: "select-tab",
  //       name: "name",
  //       label: "مقطع تحصیلی",
  //     },
  //     {
  //       type: "select",
  //       name: "name",
  //       label: "رشته تحصیلی",
  //     },
  //     {
  //       type: "input",
  //       name: "name",
  //       label: "دانشگاه",
  //     },
  //     {
  //       type: "input",
  //       name: "name",
  //       label: "معدل (اختیاری)",
  //     },
  //     {
  //       type: "select",
  //       name: "name",
  //       label: "سال شروع",
  //     },
  //     {
  //       type: "select",
  //       name: "name",
  //       label: "سال پایان",
  //     },
  //     {
  //       type: "checkbox",
  //       name: "name",
  //       label: "هنوز در این مقطع مشغول به تحصیل هستم. ",
  //     },
  //   ],
  // },
  // workExperience: {
  //   title: "افزودن سابقه شغلی جدید",
  //   customContent: false,
  //   fields: [
  //     {
  //       type: "input",
  //       name: "name",
  //       label: "عنوان شغل",
  //     },
  //     {
  //       type: "select",
  //       name: "name",
  //       label: "زمینه فعالیت شما در این شرکت",
  //       primaryTip: "مثلا زمینه فعالیت شغل حسابدار، مالی و حسابداری می‌باشد",
  //     },
  //     {
  //       type: "select",
  //       name: "name",
  //       label: "رده سازمانی",
  //     },
  //     {
  //       type: "input",
  //       name: "name",
  //       label: "نام سازمان",
  //     },
  //     {
  //       type: "select",
  //       name: "name",
  //       label: "زمینه فعالیت شرکت (اختیاری)",
  //       primaryTip:
  //         "زمینه فعالیت شرکتی که در آن مشغول بودید (مثال: مدیر مالی شرکت کاله - زمینه فعالیت شرکت: کالاهای مصرفی و تند گردش)",
  //     },
  //     (multiple = [
  //       {
  //         0: [
  //           {
  //             type: "select-custom",
  //             name: "name",
  //             label: "کشور",
  //           },
  //           {
  //             type: "select-custom",
  //             name: "name",
  //             label: "شهر",
  //           },
  //         ],
  //         1: [
  //           {
  //             type: "select",
  //             name: "name",
  //             label: "ماه شروع",
  //           },
  //           {
  //             type: "select",
  //             name: "name",
  //             label: "سال شروع",
  //           },
  //         ],
  //         2: [
  //           {
  //             type: "select",
  //             name: "name",
  //             label: "ماه پایان",
  //           },
  //           {
  //             type: "select",
  //             name: "name",
  //             label: "سال پایان",
  //           },
  //         ],
  //       },
  //     ]),
  //     {
  //       type: "checkbox",
  //       name: "name",
  //       label: "هنوز در این شرکت مشغول به کار هستم",
  //     },
  //     {
  //       type: "textarea",
  //       name: "name",
  //       label: "دستاورد‌ها و وظایف کلیدی (اختیاری)",
  //       primaryTip:
  //         "در این قسمت می توانید مهمترین وظایفی که در این شرکت به عهده داشتید و همچنین نتایج مطلوبی که در کار خود به آن رسیدید را ذکر کنید تا کارفرما نگاه دقیق تری به تجربه شغلی مورد نظر شما داشته باشد.",
  //     },
  //   ],
  // },
  // languages: {
  //   title: "درباره من",
  //   customContent: false,
  //   fields: [
  //     {
  //       type: "select",
  //       name: "name",
  //       label: "زبان",
  //     },
  //     {
  //       type: "select",
  //       name: "name",
  //       label: "سطح مهارت",
  //     },
  //   ],
  // },
};
