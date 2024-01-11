const routes = [
  {
    path: "/",
    component: () => import("src/layouts/MainLayout.vue"),
    children: [{ path: "", component: () => import("pages/IndexPage.vue") }],
  },
  {
    path: "/jobs",
    component: () => import("src/layouts/MainLayout.vue"),
    children: [{ path: "", component: () => import("src/pages/JobsListPage.vue") }],
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
    children: [{ path: "", component: () => import("pages/myResume.vue") }],
  },
  {
    path: "/top-companies",
    component: () => import("src/layouts/MainLayout.vue"),
    children: [{ path: "", component: () => import("pages/TopCompanies.vue") }],
  },
  {
    path: "/company",
    component: () => import("src/layouts/MainLayout.vue"),
    children: [{ path: "", component: () => import("pages/CompanyPage.vue") }],
  },
  {
    path: "/job",
    component: () => import("src/layouts/MainLayout.vue"),
    children: [{ path: "", component: () => import("pages/JobInfoPage.vue") }],
  },
  {
    path: "/test",
    component: () => import("src/layouts/MainLayout.vue"),
    children: [{ path: "", component: () => import("pages/TestPage.vue") }],
  },

  {
    path: "/:catchAll(.*)*",
    component: () => import("pages/ErrorNotFound.vue"),
  },
];

export default routes;
