const routes = [
  {
    path: "/",
    component: () => import("src/layouts/MainPageLayout.vue"),
    children: [{ path: "", component: () => import("pages/IndexPage.vue") }],
  },
  {
    path: "/jobs",
    component: () => import("src/layouts/MainLayout.vue"),
    children: [{ path: "", component: () => import("pages/JobsPage.vue") }],
  },
  {
    path: "/recommended-jobs",
    component: () => import("src/layouts/MainLayout.vue"),
    children: [
      { path: "", component: () => import("pages/RecommendedPage.vue") },
    ],
  },
  {
    path: "/my-cv",
    component: () => import("src/layouts/MainLayout.vue"),
    children: [
      { path: "", component: () => import("pages/myResume.vue") },
    ],
  },
  {
    path: "/test",
    component: () => import("src/layouts/MainLayout.vue"),
    children: [
      { path: "", component: () => import("pages/TestPage.vue") },
    ],
  },

  // Always leave this as last one,
  // but you can also remove it
  {
    path: "/:catchAll(.*)*",
    component: () => import("pages/ErrorNotFound.vue"),
  },
];

export default routes;
