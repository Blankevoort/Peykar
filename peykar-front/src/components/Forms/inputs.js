export const formConfigs = {
  about: {
    title: "ویرایش درباره من",
    customContent: true,
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
        maxWords: 1500,
      },
    ],
  },
};
