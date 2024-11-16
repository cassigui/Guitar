import { NgModule } from '@angular/core';
import { PreloadAllModules, RouterModule, Routes } from '@angular/router';

const routes: Routes = [
    { path: '', redirectTo: 'auth/login', pathMatch: 'full' },
    {
        path: 'access-levels',
        loadChildren: () =>
            import('./modules/account/access-levels/access-level.module').then(
                (mod) => mod.AccessLevelModule
            ),
    },
    {
        path: 'auditings',
        loadChildren: () =>
            import('./modules/auditings/auditing.module').then(
                (mod) => mod.AuditingModule
            ),
    },
    {
        path: 'brands',
        loadChildren: () =>
            import('./modules/brands/brand.module').then(
                (mod) => mod.BrandModule
            ),
    },
    {
        path: 'auth',
        loadChildren: () =>
            import('./modules/account/auth/auth.module').then(
                (mod) => mod.AuthModule
            ),
    },
    {
        path: 'categories',
        loadChildren: () =>
            import('./modules/categories/category.module').then(
                (mod) => mod.CategoryModule
            ),
    },
    {
        path: 'banners',
        loadChildren: () =>
            import('./modules/banners/banner.module').then(
                (mod) => mod.BannerModule
            ),
    },
    {
        path: 'configs',
        loadChildren: () =>
            import('./modules/configs/configs.module').then(
                (mod) => mod.ConfigsPageModule
            ),
    },
    {
        path: 'cities',
        loadChildren: () =>
            import('./modules/addressing/cities/city.module').then(
                (mod) => mod.CityModule
            ),
    },
    {
        path: 'dashboard',
        loadChildren: () =>
            import('./modules/dashboard/dashboard.module').then(
                (mod) => mod.DashboardPageModule
            ),
    },
    {
        path: 'products',
        loadChildren: () =>
            import('./modules/products/product.module').then(
                (mod) => mod.ProductModule
            ),
    },
    {
        path: 'comments',
        loadChildren: () =>
            import('./modules/comments/comment.module').then(
                (mod) => mod.CommentModule
            ),
    },
    {
        path: 'users',
        loadChildren: () =>
            import('./modules/account/users/user.module').then(
                (mod) => mod.UserModule
            ),
    },
];

@NgModule({
    imports: [
        RouterModule.forRoot(routes, { preloadingStrategy: PreloadAllModules }),
    ],
    exports: [RouterModule],
})
export class AppRoutingModule { }
