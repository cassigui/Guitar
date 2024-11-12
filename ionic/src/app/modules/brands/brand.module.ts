import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import { AuthGuard } from 'src/app/modules/account/auth/auth.guard';

const routes: Routes = [
    {
        path: '',
        data: {
            auth: [{ view: 'brands' }]
        },
        loadChildren: () => import('./index/index.module').then(mod => mod.IndexPageModule),
        canActivate: [AuthGuard]
    },
    {
        path: 'create',
        data: {
            auth: [{ create: 'brands' }],
        },
        canActivate: [AuthGuard],
        loadChildren: () => import('./create/create.module').then(mod => mod.CreatePageModule),
    },
    {
        path: ':id',
        data: {
            auth: [{ update: 'brands' }],
        },
        canActivate: [AuthGuard],
        loadChildren: () => import('./create/create.module').then(mod => mod.CreatePageModule),
    },
];

@NgModule({
    declarations: [],
    imports: [RouterModule.forChild(routes)],
    exports: [RouterModule]
})
export class BrandModule { }