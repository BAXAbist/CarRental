package com.voak.android.rentnewcar.view

import android.os.Bundle
import android.view.LayoutInflater
import android.view.View
import android.view.ViewGroup
import android.widget.Button
import android.widget.EditText
import android.widget.TextView
import androidx.fragment.app.Fragment
import com.voak.android.rentnewcar.MyApplication
import com.voak.android.rentnewcar.R
import com.voak.android.rentnewcar.di.components.DaggerLoginFragmentComponent
import com.voak.android.rentnewcar.di.modules.LoginFragmentModule
import com.voak.android.rentnewcar.presenter.LoginFragmentPresenter
import javax.inject.Inject

class LoginFragmentViewImpl : Fragment(), LoginFragmentView {

    private lateinit var loginEditText : EditText
    private lateinit var passwordEditText : EditText
    private lateinit var enterButton: Button
    private lateinit var registerTextView: TextView

    @Inject lateinit var presenter: LoginFragmentPresenter
    private lateinit var callback: OnCreateNewAccountListener

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)

        DaggerLoginFragmentComponent.builder()
            .appComponent(MyApplication.instance.getAppComponent())
            .loginFragmentModule(LoginFragmentModule(this))
            .build()
            .inject(this)
    }

    override fun onCreateView(
        inflater: LayoutInflater,
        container: ViewGroup?,
        savedInstanceState: Bundle?
    ): View? {
        val view = inflater.inflate(R.layout.login_fragment, container, false)

        loginEditText = view.findViewById(R.id.login_edit_text)
        passwordEditText = view.findViewById(R.id.password_edit_text)
        enterButton = view.findViewById(R.id.login_button)
        registerTextView = view.findViewById(R.id.register_text_view)

        registerTextView.setOnClickListener {
            presenter.onRegisterAccountClicked()
        }

        return view
    }

    override fun navigateToRegisterFragment() {
        callback.onCreateNewAccountClicked()
    }

    public fun setOnCreateNewAccountListener(callback: OnCreateNewAccountListener) {
        this.callback = callback
    }

    interface OnCreateNewAccountListener {
        fun onCreateNewAccountClicked()
    }
}