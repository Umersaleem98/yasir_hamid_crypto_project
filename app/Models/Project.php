<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Project extends Model
{
    use HasFactory;
    protected $fillable = [
        'projectName',
        'projectSymbol',
        'projectLogo',
        'selectProjectType',
        'selectProjectCategory',
        'selectProjectStandard',
        'selectProjectPlatform',
        'selectProjectDomain',
        'projectAuditFile',
        'projectLaunchDate',
        'projectWebsiteURL',
        'projectGitHubURL',
        'projectTotalSupply',
        'projectCirculatingSupply',
        'projectWhitepaperURL',
        'selectProjectSocialMedia',
        'enterSocialMediaURL',
        'selectDeveloper',
        'selectCompany',
        'selectPromoterName',
        'selectPrivateInvestor',
        'privateInvestorTokenRelease',
        'radioInvestorRelease',
        'comment'
    ];
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
