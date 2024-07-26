export const formConfigs = {
  about: {
    title: "درباره من",
    customContent: true,
    component: () => import("./CustomContents/AboutCustomContent.vue"),
    width: "lg",
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
  info: {
    title: "اطلاعات اولیه",
    customContent: false,
    fields: [
      {
        type: "input",
        name: "name",
        label: "نام و نام خانوادگی",
      },
      {
        type: "select-tab",
        name: "gender",
        label: "جنسیت",
        options: [
          { name: "مرد", label: "مرد" },
          { name: "زن", label: "زن" },
        ],
      },
      {
        type: "select-tab",
        name: "maritalStatus",
        label: "وضعیت تاهل",
        options: [
          { name: "مجرد", label: "مجرد" },
          { name: "متاهل", label: "متاهل" },
        ],
      },
      {
        type: "select",
        name: "militaryServiceStatus",
        label: "وضعیت نظام وظیفه",
        options: ["معاف", "در حال خدمت", "پایان خدمت"],
      },
      {
        type: "select-custom",
        name: "city",
        label: "شهر محل سکونت",
        options: ["تهران", "مشهد", "اصفهان"],
      },
      {
        type: "select",
        name: "address",
        label: "محله",
        primaryTip:
          "وارد کردن محل سکونت دقیق به ما کمک می کند که پیشنهادهای شغلی نزدیک تر به محل زندگی شما را با اولویت بالاتری به شما پیشنهاد دهیم",
        options: ["منطقه 1", "منطقه 2", "منطقه 3"],
      },
      {
        type: "select-age",
        name: "birthDate",
        label: "تاریخ تولد",
      },
      {
        type: "input",
        name: "phoneNumber",
        label: "شماره تلفن ثابت (اختیاری)",
        primaryTip:
          "در صورتی که کارفرما بخواهد با شما تماس بگیرد و موبایل شما در دسترس نباشد این شماره تلفن ثابت به شما کمک می کند که تماس کارفرما را از دست ندهید",
      },
      {
        type: "select",
        name: "expectedSalary",
        label: "حقوق درخواستی",
        primaryTip:
          "منظور از حقوق درخواستی مجموع کل دریافتی های شما در هر ماه است",
        options: ["کمتر از 3 میلیون", "3 تا 5 میلیون", "بیشتر از 5 میلیون"],
      },
      {
        type: "select-custom",
        name: "interestedJobGroups",
        label: "علاقمند به استخدام در کدام حوزه شغلی هستید؟ (حداکثر ۳ مورد)",
        primaryTip:
          "شما با وارد کردن گروه های شغلی مورد علاقه خود می توانید آگهی های شغلی مرتبط با این گروه ها را در قالب ایمیل دریافت کنید.",
        options: ["نرم افزار", "سخت افزار", "مدیریت"],
      },
      {
        type: "checkbox",
        name: "foreigners",
        label: "اتباع خارجی هستم",
        questionOnTrue: [
          {
            title: "ملیت",
            name: "nationality",
            options: ["آمریکایی", "آلمانی", "ایرانی"],
          },
        ],
      },
      {
        type: "checkbox",
        name: "disability",
        label: "دارای معلولیت هستم",
        questionOnTrue: [
          {
            title: "نوع معلولیت",
            name: "disabilityType",
            options: ["جسمی", "ذهنی", "شنوایی"],
          },
        ],
      },
    ],
  },
  education: {
    title: "سابقه تحصیلی",
    customContent: false,
    width: "lg",
    height: "xl",
    fields: [
      {
        type: "select-tab",
        name: "degree",
        label: "مقطع تحصیلی",
        options: [
          { name: "کارشناسی", label: "کارشناسی" },
          { name: "کارشناسی ارشد", label: "کارشناسی ارشد" },
          { name: "دکتری", label: "دکتری" },
        ],
      },
      {
        type: "select",
        name: "field",
        label: "رشته تحصیلی",
        options: ["مهندسی کامپیوتر", "مهندسی برق", "مدیریت"],
      },
      {
        type: "input",
        name: "university",
        label: "دانشگاه",
      },
      {
        type: "input",
        name: "gpa",
        label: "معدل (اختیاری)",
      },
      {
        type: "select",
        name: "startYear",
        label: "سال شروع",
        options: ["1400", "1401", "1402"],
      },
      {
        type: "select",
        name: "endYear",
        label: "سال پایان",
        options: ["1401", "1402", "1403"],
      },
      {
        type: "checkbox",
        name: "isStudying",
        label: "هنوز در این مقطع مشغول به تحصیل هستم.",
      },
    ],
  },
  workExperience: {
    title: "سابقه شغلی جدید",
    customContent: false,
    width: "lg",
    fields: [
      {
        type: "input",
        name: "jobTitle",
        label: "عنوان شغل",
      },
      {
        type: "select",
        name: "field",
        label: "زمینه فعالیت شما در این شرکت",
        primaryTip: "مثلا زمینه فعالیت شغل حسابدار، مالی و حسابداری می‌باشد",
        options: ["مالی", "تکنولوژی", "مدیریت"],
      },
      {
        type: "select",
        name: "organizationalLevel",
        label: "رده سازمانی",
        options: ["کارشناس", "مدیر", "کارآموز"],
      },
      {
        type: "input",
        name: "companyName",
        label: "نام سازمان",
      },
      {
        type: "select",
        name: "companyField",
        label: "زمینه فعالیت شرکت (اختیاری)",
        primaryTip:
          "زمینه فعالیت شرکتی که در آن مشغول بودید (مثال: مدیر مالی شرکت کاله - زمینه فعالیت شرکت: کالاهای مصرفی و تند گردش)",
        options: ["کالاهای مصرفی", "تولید", "خدمات"],
      },
      {
        type: "multiple",
        label: "محل",
        multiple: [
          {
            type: "select-custom",
            name: "country",
            label: "کشور",
            options: ["ایران", "آمریکا", "آلمان"],
          },
          {
            type: "select-custom",
            name: "city",
            label: "شهر",
            options: ["تهران", "نیویورک", "برلین"],
          },
        ],
      },
      {
        type: "multiple",
        label: "شروع",
        multiple: [
          {
            type: "select",
            name: "startMonth",
            label: "ماه شروع",
            options: ["فروردین", "اردیبهشت", "خرداد"],
          },
          {
            type: "select",
            name: "startYear",
            label: "سال شروع",
            options: ["1400", "1401", "1402"],
          },
        ],
      },
      {
        type: "multiple",
        label: "پایان",
        multiple: [
          {
            type: "select",
            name: "endMonth",
            label: "ماه پایان",
            options: ["تیر", "مرداد", "شهریور"],
          },
          {
            type: "select",
            name: "endYear",
            label: "سال پایان",
            options: ["1401", "1402", "1403"],
          },
        ],
      },
      {
        type: "checkbox",
        name: "currentlyWorking",
        label: "هنوز در این شرکت مشغول به کار هستم",
      },
      {
        type: "textarea",
        name: "achievements",
        label: "دستاورد‌ها و وظایف کلیدی (اختیاری)",
        primaryTip:
          "در این قسمت می توانید مهمترین وظایفی که در این شرکت به عهده داشتید و همچنین نتایج مطلوبی که در کار خود به آن رسیدید را ذکر کنید تا کارفرما نگاه دقیق تری به تجربه شغلی مورد نظر شما داشته باشد.",
      },
    ],
  },
  languages: {
    title: "زبان‌ها",
    customContent: false,
    fields: [
      {
        type: "select",
        name: "language",
        label: "زبان",
        options: ["انگلیسی", "آلمانی", "فرانسه"],
      },
      {
        type: "select",
        name: "proficiency",
        label: "سطح مهارت",
        options: ["مبتدی", "متوسط", "پیشرفته"],
      },
    ],
  },
  softwareSkills: {
    title: "نرم افزار",
    customContent: true,
    component: () => import("./CustomContents/SoftWareSkillsFullForm.vue"),
    customDoneButton: "ذخیره و بستن",
    CustomCancelButton: false,
    width: "lg",
  },
  additionalSkills: {
    title: "مهارت‌های تکمیلی",
    customContent: true,
    component: () => import("./CustomContents/AdditionalSkillsFullForm.vue"),
    actionButtons: true,
    width: "lg",
  },
};
