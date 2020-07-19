package com.voak.android.rentnewcar

import android.content.Context
import android.content.Intent
import androidx.appcompat.app.AppCompatActivity
import android.os.Bundle
import androidx.fragment.app.Fragment
import com.voak.android.rentnewcar.view.EditInfoFragmentImpl

class EditInfoActivity : AppCompatActivity() {

    companion object {
        const val EXTRA_IS_EDIT_INFO_FRAGMENT = "isEditInfoFragment"

        fun newIntent(context: Context, isEditInfo: Boolean): Intent {
            val intent = Intent(context, EditInfoActivity::class.java)
            intent.putExtra(EXTRA_IS_EDIT_INFO_FRAGMENT, isEditInfo)

            return intent
        }
    }

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_edit_info)

//        val isEditInfo = intent.getBooleanExtra(EXTRA_IS_EDIT_INFO_FRAGMENT, true)
//
//        var fragment: Fragment
//
//        if (isEditInfo) {
//            fragment = EditInfoFragmentImpl()
//        }
//
    }
}