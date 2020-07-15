package com.voak.android.rentnewcar.presenter

import com.voak.android.rentnewcar.repository.RegisterFragmentRepository
import com.voak.android.rentnewcar.view.RegisterFragmentView

class RegisterFragmentPresenterImpl(
    private val view: RegisterFragmentView,
    private val repository: RegisterFragmentRepository
) : RegisterFragmentPresenter {

    override fun onBackButtonClicked() {
        view.navigateToLoginFragment()
    }
}