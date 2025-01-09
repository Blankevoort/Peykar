import { useQuasar } from "quasar";

export function useErrorHandler() {
  const $q = useQuasar();

  const handleError = (error) => {
    if (error.response) {
      const status = error.response.status;
      const messages = {
        400: "اطلاعات وارد شده معتبر نیستند.",
        401: "شما باید وارد شوید.",
        403: "دسترسی غیرمجاز.",
        404: "منبع پیدا نشد.",
        500: "خطای سمت سرور: مشکلی رخ داده است.",
      };

      $q.notify({
        message: messages[status] || "خطای نامشخص رخ داده است.",
        color: "red",
        position: "bottom-left",
      });
    } else if (error.request) {
      $q.notify({
        message: "خطای سمت سرور: درخواست ارسال نشد.",
        color: "red",
        position: "bottom-left",
      });
    } else {
      $q.notify({
        message: "خطای نامشخص رخ داده است.",
        color: "red",
        position: "bottom-left",
      });
    }
  };

  return { handleError };
}
