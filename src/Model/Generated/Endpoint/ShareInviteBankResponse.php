<?php
namespace bunq\Model\Generated\Endpoint;

use bunq\Http\ApiClient;
use bunq\Model\Core\BunqModel;
use bunq\Model\Generated\Object\LabelMonetaryAccount;
use bunq\Model\Generated\Object\LabelUser;
use bunq\Model\Generated\Object\ShareDetail;

/**
 * Used to view or respond to shares a user was invited to. See
 * 'share-invite-bank-inquiry' for more information about the inquiring
 * endpoint.
 *
 * @generated
 */
class ShareInviteBankResponse extends BunqModel
{
    /**
     * Endpoint constants.
     */
    const ENDPOINT_URL_READ = 'user/%s/share-invite-bank-response/%s';
    const ENDPOINT_URL_UPDATE = 'user/%s/share-invite-bank-response/%s';
    const ENDPOINT_URL_LISTING = 'user/%s/share-invite-bank-response';

    /**
     * Field constants.
     */
    const FIELD_STATUS = 'status';

    /**
     * Object type.
     */
    const OBJECT_TYPE_GET = 'ShareInviteBankResponse';

    /**
     * The monetary account and user who created the share.
     *
     * @var LabelMonetaryAccount
     */
    protected $counterAlias;

    /**
     * The user who cancelled the share if it has been revoked or rejected.
     *
     * @var LabelUser
     */
    protected $userAliasCancelled;

    /**
     * The id of the monetary account the ACCEPTED share applies to. null
     * otherwise.
     *
     * @var int
     */
    protected $monetaryAccountId;

    /**
     * The id of the draft share invite bank.
     *
     * @var int
     */
    protected $draftShareInviteBankId;

    /**
     * The share details.
     *
     * @var ShareDetail
     */
    protected $shareDetail;

    /**
     * The status of the share. Can be PENDING, REVOKED (the user deletes the
     * share inquiry before it's accepted), ACCEPTED, CANCELLED (the user
     * deletes an active share) or CANCELLATION_PENDING, CANCELLATION_ACCEPTED,
     * CANCELLATION_REJECTED (for canceling mutual connects)
     *
     * @var string
     */
    protected $status;

    /**
     * The share type, either STANDARD or MUTUAL.
     *
     * @var string
     */
    protected $shareType;

    /**
     * The start date of this share.
     *
     * @var string
     */
    protected $startDate;

    /**
     * The expiration date of this share.
     *
     * @var string
     */
    protected $endDate;

    /**
     * The description of this share. It is basically the monetary account
     * description.
     *
     * @var string
     */
    protected $description;

    /**
     * Return the details of a specific share a user was invited to.
     *
     * @param int $shareInviteBankResponseId
     * @param string[] $customHeaders
     *
     * @return BunqResponseShareInviteBankResponse
     */
    public static function get(
        int $shareInviteBankResponseId,
        array $customHeaders = []
    ): BunqResponseShareInviteBankResponse {
        $apiClient = new ApiClient(static::getApiContext());
        $responseRaw = $apiClient->get(
            vsprintf(
                self::ENDPOINT_URL_READ,
                [static::determineUserId(), $shareInviteBankResponseId]
            ),
            [],
            $customHeaders
        );

        return BunqResponseShareInviteBankResponse::castFromBunqResponse(
            static::fromJson($responseRaw, self::OBJECT_TYPE_GET)
        );
    }

    /**
     * Accept or reject a share a user was invited to.
     *
     * @param int $shareInviteBankResponseId
     * @param string|null $status The status of the share. Can be PENDING,
     *                            REVOKED (the user deletes the share inquiry before it's accepted),
     *                            ACCEPTED, CANCELLED (the user deletes an active share) or
     *                            CANCELLATION_PENDING, CANCELLATION_ACCEPTED, CANCELLATION_REJECTED (for
     *                            canceling mutual connects)
     * @param string[] $customHeaders
     *
     * @return BunqResponseInt
     */
    public static function update(
        int $shareInviteBankResponseId,
        string $status = null,
        array $customHeaders = []
    ): BunqResponseInt {
        $apiClient = new ApiClient(static::getApiContext());
        $responseRaw = $apiClient->put(
            vsprintf(
                self::ENDPOINT_URL_UPDATE,
                [static::determineUserId(), $shareInviteBankResponseId]
            ),
            [self::FIELD_STATUS => $status],
            $customHeaders
        );

        return BunqResponseInt::castFromBunqResponse(
            static::processForId($responseRaw)
        );
    }

    /**
     * Return all the shares a user was invited to.
     *
     * This method is called "listing" because "list" is a restricted PHP word
     * and cannot be used as constants, class names, function or method names.
     *
     * @param string[] $params
     * @param string[] $customHeaders
     *
     * @return BunqResponseShareInviteBankResponseList
     */
    public static function listing(
        array $params = [],
        array $customHeaders = []
    ): BunqResponseShareInviteBankResponseList {
        $apiClient = new ApiClient(static::getApiContext());
        $responseRaw = $apiClient->get(
            vsprintf(
                self::ENDPOINT_URL_LISTING,
                [static::determineUserId()]
            ),
            $params,
            $customHeaders
        );

        return BunqResponseShareInviteBankResponseList::castFromBunqResponse(
            static::fromJsonList($responseRaw, self::OBJECT_TYPE_GET)
        );
    }

    /**
     * The monetary account and user who created the share.
     *
     * @return LabelMonetaryAccount
     */
    public function getCounterAlias()
    {
        return $this->counterAlias;
    }

    /**
     * @deprecated User should not be able to set values via setters, use
     * constructor.
     *
     * @param LabelMonetaryAccount $counterAlias
     */
    public function setCounterAlias($counterAlias)
    {
        $this->counterAlias = $counterAlias;
    }

    /**
     * The user who cancelled the share if it has been revoked or rejected.
     *
     * @return LabelUser
     */
    public function getUserAliasCancelled()
    {
        return $this->userAliasCancelled;
    }

    /**
     * @deprecated User should not be able to set values via setters, use
     * constructor.
     *
     * @param LabelUser $userAliasCancelled
     */
    public function setUserAliasCancelled($userAliasCancelled)
    {
        $this->userAliasCancelled = $userAliasCancelled;
    }

    /**
     * The id of the monetary account the ACCEPTED share applies to. null
     * otherwise.
     *
     * @return int
     */
    public function getMonetaryAccountId()
    {
        return $this->monetaryAccountId;
    }

    /**
     * @deprecated User should not be able to set values via setters, use
     * constructor.
     *
     * @param int $monetaryAccountId
     */
    public function setMonetaryAccountId($monetaryAccountId)
    {
        $this->monetaryAccountId = $monetaryAccountId;
    }

    /**
     * The id of the draft share invite bank.
     *
     * @return int
     */
    public function getDraftShareInviteBankId()
    {
        return $this->draftShareInviteBankId;
    }

    /**
     * @deprecated User should not be able to set values via setters, use
     * constructor.
     *
     * @param int $draftShareInviteBankId
     */
    public function setDraftShareInviteBankId($draftShareInviteBankId)
    {
        $this->draftShareInviteBankId = $draftShareInviteBankId;
    }

    /**
     * The share details.
     *
     * @return ShareDetail
     */
    public function getShareDetail()
    {
        return $this->shareDetail;
    }

    /**
     * @deprecated User should not be able to set values via setters, use
     * constructor.
     *
     * @param ShareDetail $shareDetail
     */
    public function setShareDetail($shareDetail)
    {
        $this->shareDetail = $shareDetail;
    }

    /**
     * The status of the share. Can be PENDING, REVOKED (the user deletes the
     * share inquiry before it's accepted), ACCEPTED, CANCELLED (the user
     * deletes an active share) or CANCELLATION_PENDING, CANCELLATION_ACCEPTED,
     * CANCELLATION_REJECTED (for canceling mutual connects)
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @deprecated User should not be able to set values via setters, use
     * constructor.
     *
     * @param string $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * The share type, either STANDARD or MUTUAL.
     *
     * @return string
     */
    public function getShareType()
    {
        return $this->shareType;
    }

    /**
     * @deprecated User should not be able to set values via setters, use
     * constructor.
     *
     * @param string $shareType
     */
    public function setShareType($shareType)
    {
        $this->shareType = $shareType;
    }

    /**
     * The start date of this share.
     *
     * @return string
     */
    public function getStartDate()
    {
        return $this->startDate;
    }

    /**
     * @deprecated User should not be able to set values via setters, use
     * constructor.
     *
     * @param string $startDate
     */
    public function setStartDate($startDate)
    {
        $this->startDate = $startDate;
    }

    /**
     * The expiration date of this share.
     *
     * @return string
     */
    public function getEndDate()
    {
        return $this->endDate;
    }

    /**
     * @deprecated User should not be able to set values via setters, use
     * constructor.
     *
     * @param string $endDate
     */
    public function setEndDate($endDate)
    {
        $this->endDate = $endDate;
    }

    /**
     * The description of this share. It is basically the monetary account
     * description.
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @deprecated User should not be able to set values via setters, use
     * constructor.
     *
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return bool
     */
    public function isAllFieldNull()
    {
        if (!is_null($this->counterAlias)) {
            return false;
        }

        if (!is_null($this->userAliasCancelled)) {
            return false;
        }

        if (!is_null($this->monetaryAccountId)) {
            return false;
        }

        if (!is_null($this->draftShareInviteBankId)) {
            return false;
        }

        if (!is_null($this->shareDetail)) {
            return false;
        }

        if (!is_null($this->status)) {
            return false;
        }

        if (!is_null($this->shareType)) {
            return false;
        }

        if (!is_null($this->startDate)) {
            return false;
        }

        if (!is_null($this->endDate)) {
            return false;
        }

        if (!is_null($this->description)) {
            return false;
        }

        return true;
    }
}
