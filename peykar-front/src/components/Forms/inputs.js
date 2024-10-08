export const formConfigs = {
  about: {
    title: "درباره من",
    customContent: true,
    component: () => import("./CustomContents/AboutCustomContent.vue"),
    width: "lg",
    fields: [
      {
        type: "input",
        name: "jobTitle",
        label: "عنوان شغلی نمایشی",
        tip: "در اینجا می توانید عنوان شغلی نمایشی خود برای کارفرما را وارد کنید.",
        path: "jobTitle",
      },
      {
        type: "input",
        name: "linkedIn",
        label: "آدرس پروفایل لینکدین شما",
        path: "linkedIn",
      },
      {
        type: "textarea",
        name: "description",
        label: "چند جمله درباره خود بنویسید",
        path: "description",
      },
    ],
  },
  info: {
    title: "اطلاعات اولیه",
    customContent: false,
    width: "lg",
    mainPath: "profile",
    fields: [
      {
        type: "input",
        name: "name",
        label: "نام و نام خانوادگی",
        path: "name",
      },
      {
        type: "select-tab",
        name: "gender",
        label: "جنسیت",
        options: [
          { name: "مرد", label: "مرد" },
          { name: "زن", label: "زن" },
        ],
        path: "profile.gender",
      },
      {
        type: "select-tab",
        name: "maritalStatus",
        label: "وضعیت تاهل",
        options: [
          { name: "مجرد", label: "مجرد" },
          { name: "متاهل", label: "متاهل" },
        ],
        path: "profile.maritalStatus",
      },
      {
        type: "select",
        name: "militaryServiceStatus",
        label: "وضعیت نظام وظیفه",
        options: ["معاف", "در حال خدمت", "پایان خدمت"],
        path: "profile.militaryServiceStatus",
      },
      {
        type: "select-custom",
        name: "city",
        label: "شهر محل سکونت",
        options: ["تهران", "مشهد", "اصفهان"],
        path: "profile.city",
      },
      {
        type: "select",
        name: "address",
        label: "محله",
        primaryTip:
          "وارد کردن محل سکونت دقیق به ما کمک می کند که پیشنهادهای شغلی نزدیک تر به محل زندگی شما را با اولویت بالاتری به شما پیشنهاد دهیم",
        options: ["منطقه 1", "منطقه 2", "منطقه 3"],
        path: "profile.address",
      },
      {
        type: "select-age",
        name: "birthDate",
        label: "تاریخ تولد",
        path: "profile.birthDate",
      },
      {
        type: "input",
        name: "phoneNumber",
        label: "شماره تلفن ثابت (اختیاری)",
        primaryTip:
          "در صورتی که کارفرما بخواهد با شما تماس بگیرد و موبایل شما در دسترس نباشد این شماره تلفن ثابت به شما کمک می کند که تماس کارفرما را از دست ندهید",
        path: "profile.phoneNumber",
      },
      {
        type: "select",
        name: "expectedSalary",
        label: "حقوق درخواستی",
        primaryTip:
          "منظور از حقوق درخواستی مجموع کل دریافتی های شما در هر ماه است",
        options: ["کمتر از 3 میلیون", "3 تا 5 میلیون", "بیشتر از 5 میلیون"],
        path: "profile.expectedSalary",
      },
      {
        type: "select-custom",
        name: "interestedJobGroups",
        label: "علاقمند به استخدام در کدام حوزه شغلی هستید؟ (حداکثر ۳ مورد)",
        multiple: true,
        primaryTip:
          "شما با وارد کردن گروه های شغلی مورد علاقه خود می توانید آگهی های شغلی مرتبط با این گروه ها را در قالب ایمیل دریافت کنید.",
        options: ["نرم افزار", "سخت افزار", "مدیریت"],
        path: "profile.interestedJobGroups",
      },
      {
        type: "checkbox",
        name: "foreigners",
        label: "اتباع خارجی هستم",
        path: "profile.foreigners",
        questionOnTrue: [
          {
            title: "ملیت",
            name: "nationality",
            options: ["آمریکایی", "آلمانی", "ایرانی"],
            path: "profile.nationality",
          },
        ],
      },
      {
        type: "checkbox",
        name: "disability",
        label: "دارای معلولیت هستم",
        path: "profile.disability",
        questionOnTrue: [
          {
            title: "نوع معلولیت",
            name: "disabilityType",
            options: ["جسمی", "ذهنی", "شنوایی"],
            path: "profile.disabilityType",
          },
        ],
      },
    ],
  },
  education: {
    title: "سابقه تحصیلی",
    customContent: false,
    mainPath: "profile.education.higherEducation",
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
        path: "profile.education.higherEducation.degree",
      },
      {
        type: "select",
        name: "field",
        label: "رشته تحصیلی",
        options: ["مهندسی کامپیوتر", "مهندسی برق", "مدیریت"],
        path: "profile.education.higherEducation.field",
      },
      {
        type: "input",
        name: "university",
        label: "دانشگاه",
        path: "profile.education.higherEducation.university",
      },
      {
        type: "input",
        name: "gpa",
        label: "معدل (اختیاری)",
        path: "profile.education.higherEducation.gpa",
      },
      {
        type: "select",
        name: "startYear",
        label: "سال شروع",
        options: ["1400", "1401", "1402"],
        path: "profile.education.higherEducation.startYear",
      },
      {
        type: "select",
        name: "endYear",
        label: "سال پایان",
        options: ["1401", "1402", "1403"],
        path: "profile.education.higherEducation.endYear",
      },
      {
        type: "checkbox",
        name: "isStudying",
        label: "هنوز در این مقطع مشغول به تحصیل هستم.",
        path: "profile.education.higherEducation.isStudying",
      },
    ],
  },
  workExperience: {
    title: "سابقه شغلی جدید",
    customContent: false,
    mainPath: "profile.workExperience",
    width: "lg",
    fields: [
      {
        type: "input",
        name: "jobTitle",
        label: "عنوان شغل",
        path: "profile.workExperience.jobTitle",
      },
      {
        type: "select",
        name: "field",
        label: "زمینه فعالیت شما در این شرکت",
        primaryTip: "مثلا زمینه فعالیت شغل حسابدار، مالی و حسابداری می‌باشد",
        options: ["مالی", "تکنولوژی", "مدیریت"],
        path: "profile.workExperience.field",
      },
      {
        type: "select",
        name: "organizationalLevel",
        label: "رده سازمانی",
        options: ["کارشناس", "مدیر", "کارآموز"],
        path: "profile.workExperience.organizationalLevel",
      },
      {
        type: "input",
        name: "companyName",
        label: "نام سازمان",
        path: "profile.workExperience.companyName",
      },
      {
        type: "select",
        name: "companyField",
        label: "زمینه فعالیت شرکت (اختیاری)",
        primaryTip:
          "زمینه فعالیت شرکتی که در آن مشغول بودید (مثال: مدیر مالی شرکت کاله - زمینه فعالیت شرکت: کالاهای مصرفی و تند گردش)",
        options: ["کالاهای مصرفی", "تولید", "خدمات"],
        path: "profile.workExperience.companyField",
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
            path: "profile.workExperience.country",
          },
          {
            type: "select-custom",
            name: "city",
            label: "شهر",
            options: ["تهران", "نیویورک", "برلین"],
            path: "profile.workExperience.city",
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
            path: "profile.workExperience.startMonth",
          },
          {
            type: "select",
            name: "startYear",
            label: "سال شروع",
            options: ["1400", "1401", "1402"],
            path: "profile.workExperience.startYear",
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
            path: "profile.workExperience.endMonth",
          },
          {
            type: "select",
            name: "endYear",
            label: "سال پایان",
            options: ["1401", "1402", "1403"],
            path: "profile.workExperience.endYear",
          },
        ],
      },
      {
        type: "checkbox",
        name: "currentlyWorking",
        label: "هنوز در این شرکت مشغول به کار هستم",
        path: "profile.workExperience.currentlyWorking",
      },
      {
        type: "textarea",
        name: "achievements",
        label: "دستاورد‌ها و وظایف کلیدی (اختیاری)",
        primaryTip:
          "در این قسمت می توانید مهمترین وظایفی که در این شرکت به عهده داشتید و همچنین نتایج مطلوبی که در کار خود به آن رسیدید را ذکر کنید تا کارفرما نگاه دقیق تری به تجربه شغلی مورد نظر شما داشته باشد.",
        path: "profile.workExperience.achievements",
      },
    ],
  },
  languages: {
    title: "زبان‌ها",
    customContent: false,
    mainPath: "profile.languages",
    fields: [
      {
        type: "select",
        name: "language",
        label: "زبان",
        options: ["انگلیسی", "آلمانی", "فرانسه"],
        path: "profile.languages.language",
      },
      {
        type: "select",
        name: "proficiency",
        label: "سطح مهارت",
        options: ["مبتدی", "متوسط", "پیشرفته"],
        path: "profile.languages.proficiency",
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
  educationCourses: {
    title: "دوره آموزشی",
    customContent: false,
    mainPath: "profile.additionalInformation.educationCourses",
    fields: [
      {
        type: "input",
        name: "language",
        label: "نام دوره",
        path: "profile.additionalInformation.educationCourses.courseName",
      },
      {
        type: "input",
        name: "proficiency",
        label: "آموزگار",
        path: "profile.additionalInformation.educationCourses.organizer",
      },
      {
        type: "input",
        name: "courseDuration",
        label: "طول دوره",
        path: "profile.additionalInformation.educationCourses.courseDuration",
      },
      {
        type: "input",
        name: "proficiency",
        label: "سال دوره",
        path: "profile.additionalInformation.educationCourses.courseYear",
      },
    ],
  },
  formerColleagues: {
    title: "مدیر یا همکار سابق",
    customContent: true,
    component: () =>
      import("./CustomContents/FormerColleagues/TopComponent.vue"),
    customBottomContent: true,
    bottomComponent: () =>
      import("./CustomContents/FormerColleagues/BottomComponent.vue"),
    mainPath: "profile.additionalInformation.formerColleagues",
    fields: [
      {
        filled: true,
        type: "input",
        name: "fullName",
        label: "نام و نام خانوادگی",
        path: "profile.additionalInformation.formerColleagues.fullName",
      },
      {
        type: "multiple",
        label: "محل",
        multiple: [
          {
            filled: true,
            type: "input",
            name: "organizationName",
            label: "نام سازمان",
            path: "profile.additionalInformation.formerColleagues.organizationName",
          },
          {
            filled: true,
            type: "input",
            name: "jobTitle",
            label: "سمت سازمانی",
            path: "profile.additionalInformation.formerColleagues.jobTitle",
          },
        ],
      },
      {
        type: "input",
        name: "organizationalRelationship",
        label: "رابطه سازمانی",
        path: "profile.additionalInformation.formerColleagues.organizationalRelationship",
      },
      {
        type: "multiple",
        label: "محل",
        multiple: [
          {
            type: "input",
            name: "startYear",
            label: "سال شروع همکاری",
            path: "profile.additionalInformation.formerColleagues.startYear",
          },
          {
            type: "input",
            name: "endYear",
            label: "سال پایان همکاری",
            path: "profile.additionalInformation.formerColleagues.endYear",
          },
        ],
      },
      {
        type: "checkbox",
        name: "weStillWorkTogether",
        label: "هنوز همکار هستی.",
        path: "profile.additionalInformation.formerColleagues.weStillWorkTogether",
      },
      {
        filled: true,
        type: "input",
        name: "contactNumber",
        label: "شماره تماس",
        path: "profile.additionalInformation.formerColleagues.contactNumber",
      },
    ],
  },
  awards: {
    title: "جایزه و افتخار",
    customContent: false,
    mainPath: "profile.additionalInformation.awards",
    fields: [
      {
        type: "textarea",
        name: "title",
        label: "عنوان",
        filled: true,
        path: "profile.additionalInformation.awards.title",
      },
      {
        type: "select",
        name: "year",
        label: "سال",
        options: ["1400", "14001", "1402"],
        filled: true,
        path: "profile.additionalInformation.awards.year",
      },
    ],
  },
  academicExperiences: {
    title: "پروژه یا تجربه آکادمیک",
    customContent: false,
    mainPath: "profile.additionalInformation.academicExperiences",
    fields: [
      {
        type: "input",
        name: "title",
        label: "عنوان",
        filled: true,
        path: "profile.additionalInformation.academicExperiences.title",
      },
      {
        type: "select",
        name: "year",
        label: "سال",
        options: ["1400", "14001", "1402"],
        filled: true,
        path: "profile.additionalInformation.academicExperiences.year",
      },
    ],
  },
  booksAndArticles: {
    title: "کتاب یا مقاله",
    customContent: false,
    mainPath: "profile.additionalInformation.publications",
    fields: [
      {
        type: "input",
        name: "title",
        label: "عنوان",
        filled: true,
        path: "profile.additionalInformation.publications.title",
      },
      {
        type: "input",
        name: "publisher",
        label: "ناشر",
        filled: true,
        path: "profile.additionalInformation.publications.publisher",
      },
      {
        type: "select",
        name: "year",
        label: "سال",
        options: ["1400", "14001", "1402"],
        filled: true,
        path: "profile.additionalInformation.publications.year",
      },
    ],
  },
  voluntaryActivities: {
    title: "فعالیت داوطلبانه",
    customContent: false,
    mainPath: "profile.additionalInformation.volunteerActivities",
    fields: [
      {
        type: "input",
        name: "title",
        label: "عنوان",
        filled: true,
        path: "profile.additionalInformation.volunteerActivities.title",
      },
      {
        type: "select",
        name: "year",
        label: "سال",
        options: ["1400", "14001", "1402"],
        filled: true,
        path: "profile.additionalInformation.volunteerActivities.year",
      },
    ],
  },
};
