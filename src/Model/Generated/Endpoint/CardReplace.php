<?php
namespace bunq\Model\Generated\Endpoint;

use bunq\Http\ApiClient;
use bunq\Model\Core\BunqModel;

/**
 * It is possible to order a card replacement with the bunq
 * API.<br/><br/>You can order up to one free card replacement per year.
 * Additional replacement requests will be billed.<br/><br/>The card
 * replacement will have the same expiry date and the same pricing as the
 * old card, but it will have a new card number. You can change the
 * description and optional the PIN through the card replacement endpoint.
 *
 * @generated
 */
class CardReplace extends BunqModel
{
    /**
     * Endpoint constants.
     */
    const ENDPOINT_URL_CREATE = 'user/%s/card/%s/replace';

    /**
     * Field constants.
     */
    const FIELD_PIN_CODE = 'pin_code';
    const FIELD_SECOND_LINE = 'second_line';

    /**
     * The id of the new card.
     *
     * @var int
     */
    protected $id;

    /**
     * Request a card replacement.
     *
     * @param int $cardId
     * @param string|null $pinCode    The plaintext pin code. Requests require
     *                                encryption to be enabled.
     * @param string|null $secondLine The second line on the card.
     * @param string[] $customHeaders
     *
     * @return BunqResponseInt
     */
    public static function create(
        int $cardId,
        string $pinCode = null,
        string $secondLine = null,
        array $customHeaders = []
    ): BunqResponseInt {
        $apiClient = new ApiClient(static::getApiContext());
        $apiClient->enableEncryption();
        $responseRaw = $apiClient->post(
            vsprintf(
                self::ENDPOINT_URL_CREATE,
                [static::determineUserId(), $cardId]
            ),
            [
                self::FIELD_PIN_CODE => $pinCode,
                self::FIELD_SECOND_LINE => $secondLine,
            ],
            $customHeaders
        );

        return BunqResponseInt::castFromBunqResponse(
            static::processForId($responseRaw)
        );
    }

    /**
     * The id of the new card.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @deprecated User should not be able to set values via setters, use
     * constructor.
     *
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return bool
     */
    public function isAllFieldNull()
    {
        if (!is_null($this->id)) {
            return false;
        }

        return true;
    }
}
