package com.voak.android.rentnewcar.presenter

import com.voak.android.rentnewcar.repository.ProfileFragmentRepository
import com.voak.android.rentnewcar.utils.QueryPreferences
import com.voak.android.rentnewcar.view.ProfileFragmentView

class ProfileFragmentPresenterImpl(
    val view: ProfileFragmentView,
    val repository: ProfileFragmentRepository
) : ProfileFragmentPresenter {

    override fun onCreateView() {
        val login = QueryPreferences.getClientLogin()
        if (!login.isNullOrEmpty()) {
            view.hideUserData()
            view.showProgress()
            repository.getClientDataByLogin(
                login,
                {
                    view.setLogin(it.login)
                    view.setName("${it.firstName} ${it.secondName} ${it.middleName}")
                    view.setPhone(it.phone)
                    view.setAddress(it.address)
                    view.hideProgress()
                    view.showUserData()
                },
                {
                    view.setErrorDescription(it)
                    view.hideProgress()
                    view.showErrorMessage()
                }
            )
        }
    }


}