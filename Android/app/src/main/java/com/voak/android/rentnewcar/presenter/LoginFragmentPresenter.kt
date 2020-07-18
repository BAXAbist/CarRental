package com.voak.android.rentnewcar.presenter

interface LoginFragmentPresenter {
    fun onCreate()
    fun onEnterButtonClicked(login: String, password: String)
    fun onRegisterAccountClicked()
}