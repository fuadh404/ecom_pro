<?php

namespace App\Http\Traits;

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\SoftDeletes;

trait AuditColumnTrait
{
    use SoftDeletes;

    // বাকি কোড অপরিবর্তিত রাখুন
    public function addAdminAuditColumns(Blueprint $table)
    {
        $table->softDeletes();

        $table->bigInteger('created_by')->nullable();
        $table->bigInteger('updated_by')->nullable();
        $table->bigInteger('deleted_by')->nullable();

        $table->foreign('created_by')->references('id')->on('admins')->onDelete('cascade')->onUpdate('cascade');
        $table->foreign('updated_by')->references('id')->on('admins')->onDelete('cascade')->onUpdate('cascade');
        $table->foreign('deleted_by')->references('id')->on('admins')->onDelete('cascade')->onUpdate('cascade');
    }

    public function dropAdminAuditColumns(Blueprint $table)
    {
        $table->dropForeign(['created_by']);
        $table->dropForeign(['updated_by']);
        $table->dropForeign(['deleted_by']);

        $table->dropColumn(['created_by', 'updated_by', 'deleted_by']);
        $table->dropSoftDeletes();
    }

    public function addMorphAuditColumns(Blueprint $table)
    {
        $table->softDeletes();

        $table->bigInteger('creater_id')->nullable();
        $table->bigInteger('updater_id')->nullable();
        $table->bigInteger('deleter_id')->nullable();

        $table->string('creater_type')->nullable();
        $table->string('updater_type')->nullable();
        $table->string('deleter_type')->nullable();
    }

    public function dropMorphAuditColumns(Blueprint $table)
    {
        $table->dropColumn([
            'creater_id',
            'updater_id',
            'deleter_id',
            'creater_type',
            'updater_type',
            'deleter_type'
        ]);

        $table->dropSoftDeletes();
    }
}
    
