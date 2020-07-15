package com.voak.android.rentnewcar.presenter

import com.voak.android.rentnewcar.repository.LoginFragmentRepository
import com.voak.android.rentnewcar.view.LoginFragmentView

class LoginFragmentPresenterImpl(
    private val view: LoginFragmentView,
    private val repository: LoginFragmentRepository
) : LoginFragmentPresenter
{

    override fun onEnterButtonClicked() {

    }

    override fun onRegisterAccountClicked() {
        view.navigateToRegisterFragment()
    }
}