package com.voak.android.rentnewcar.utils

import androidx.preference.PreferenceManager
import com.voak.android.rentnewcar.MyApplication

object QueryPreferences {
    private const val PREF_CLIENT_LOGIN: String = "clientLogin"
    private const val PREF_CLIENT_PASSWORD: String = "clientPassword"

    private val context = MyApplication.instance.applicationContext

    internal fun setClientAuthData(login: String?, password: String?) {
        PreferenceManager.getDefaultSharedPreferences(context)
            .edit()
            .putString(PREF_CLIENT_LOGIN, login)
            .putString(PREF_CLIENT_PASSWORD, password)
            .apply()
    }

    internal fun getClientLogin(): String? {
        return PreferenceManager.getDefaultSharedPreferences(context)
            .getString(PREF_CLIENT_LOGIN, null)
    }

    internal fun getClientPassword(): String? {
        return PreferenceManager.getDefaultSharedPreferences(context)
            .getString(PREF_CLIENT_PASSWORD, null)
    }

}